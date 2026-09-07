<?php

/**
 * callback_google.php
 *
 * Punto de regreso de Google (OAuth 2.0).
 *
 * Flujo general:
 * 1) Revisa si el usuario canceló o si Google envió un error.
 * 2) Valida que vengan "code" y "state" en la URL.
 * 3) Intercambia el "code" por un access_token usando cURL.
 * 4) Usa el access_token para obtener los datos del usuario (id, nombre, email, foto).
 * 5) Busca al usuario por email en la base de datos.
 * 6) Si existe, lo actualiza; si no existe, lo registra.
 * 7) Guarda al usuario en sesión y redirige al perfil.
 *
 * Documentación:
 * - Flujo OAuth Web: https://developers.google.com/identity/protocols/oauth2/web-server
 * - Token endpoint:  https://oauth2.googleapis.com/token
 * - UserInfo:        https://openid.net/specs/openid-connect-core-1_0.html#UserInfo
 */

require_once __DIR__ . "/../../core/Autoload.php";
require_once __DIR__ ."/../../../config/config.php";

// ------------------------------------------------------
// 1) Manejar errores directos enviados por Google
//    (por ejemplo: usuario canceló el login)
// ------------------------------------------------------
if (isset($_GET['error'])) {
    // Ejemplo: error=access_denied cuando el usuario presiona "Cancelar"
    $error = $_GET['error'];

    if ($error === 'access_denied') {
        $_SESSION['error'] = 'Cancelaste el inicio de sesión con Google. '
            . 'Si quieres intentar de nuevo, haz clic en "Continuar con Google".';
    } else {
        $_SESSION['error'] = 'Ocurrió un problema al iniciar sesión con Google ('
            . htmlspecialchars($error) . '). Intenta de nuevo.';
    }

    header('Location: /auth/login');
    exit;
}

// ------------------------------------------------------
// 2) Validar parámetros mínimos (code y state)
//    Sin estos datos no podemos continuar el flujo OAuth.
// ------------------------------------------------------
if (!isset($_GET['code']) || !isset($_GET['state'])) {
    $_SESSION['error'] = 'No se recibió la información necesaria desde Google. '
        . 'Por favor intenta iniciar sesión de nuevo.';
    header('Location: /auth/login');
    exit;
}

// ------------------------------------------------------
// 2.1) Validar "state" para evitar ataques CSRF
//      Comparamos el state que guardamos en sesión
//      con el que regresa Google en la URL.
// ------------------------------------------------------
if (empty($_SESSION['oauth2_state']) || $_GET['state'] !== $_SESSION['oauth2_state']) {
    unset($_SESSION['oauth2_state']);
    $_SESSION['error'] = 'La sesión de autenticación con Google no es válida. '
        . 'Por favor intenta de nuevo.';
    header('Location: /auth/login');
    exit;
}

// Una vez validado, eliminamos el state de la sesión.
unset($_SESSION['oauth2_state']);



// ------------------------------------------------------
// 3) Intercambiar el "code" por un access_token (cURL)
// ------------------------------------------------------
//
// En este punto, Google nos devuelve un parámetro "code".
// Ese código sirve para solicitar un "access_token"
// que nos permitirá obtener la información del usuario.
//
// 1) Enviamos una petición POST a GOOGLE_TOKEN_URL
//    con: code, client_id, client_secret, redirect_uri, grant_type.
// 2) Google responde con un JSON que incluye access_token.
// 3) Con ese access_token pedimos los datos del usuario en otro endpoint.
// ------------------------------------------------------
$code = $_GET['code'];

$postData = [
    'code'          => $code,
    'client_id'     => GOOGLE_CLIENT_ID,
    'client_secret' => GOOGLE_CLIENT_SECRET,
    'redirect_uri'  => GOOGLE_REDIRECT_URI,
    'grant_type'    => 'authorization_code',
];

$ch = curl_init(GOOGLE_TOKEN_URL);

curl_setopt_array($ch, [
    CURLOPT_POST           => true,
    CURLOPT_POSTFIELDS     => http_build_query($postData),
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_TIMEOUT        => 30,
    CURLOPT_SSL_VERIFYPEER => true, // false solo en DEV
]);

$response = curl_exec($ch);

if ($response === false) {
    $_SESSION['error'] = 'Error de conexión con Google: ' . curl_error($ch);
    curl_close($ch);
    header('Location: /auth/login');
    exit;
}

curl_close($ch);

if ($response === false) {
    $_SESSION['error'] = 'No se pudo conectar con Google para obtener el token. '
        . 'Intenta más tarde.';
    // Tip: podrías loguear $curlError si quieres depurar.
    header('Location: /auth/login');
    exit;
}

$tokenInfo = json_decode($response, true);

if (empty($tokenInfo['access_token'])) {
    $_SESSION['error'] = 'Google no devolvió un token de acceso válido. '
        . 'Verifica la configuración de tu app o intenta de nuevo.';
    header('Location: login.php');
    exit;
}

$accessToken = $tokenInfo['access_token'];

// ------------------------------------------------------
// 4) Obtener datos del usuario (nombre, email, foto)
// ------------------------------------------------------
//
// Usamos el access_token para llamar al endpoint de UserInfo.
// Enviamos el token en el header Authorization: Bearer <token>.
// ------------------------------------------------------
$ch = curl_init(GOOGLE_USERINFO_URL);
curl_setopt_array($ch, [
    CURLOPT_HTTPHEADER     => ['Authorization: Bearer ' . $accessToken],
    CURLOPT_RETURNTRANSFER => true,
]);

$userResponse = curl_exec($ch);
$curlError    = curl_error($ch);
curl_close($ch);

if ($userResponse === false) {
    $_SESSION['error'] = 'No se pudo conectar con Google para obtener tus datos. Intenta de nuevo.';
    // De nuevo, podrías guardar $curlError en un log.
    header('Location: /auth/login');
    exit;
}

$userInfo = json_decode($userResponse, true);

// Validar datos mínimos: necesitamos al menos id y email
if (empty($userInfo['id']) || empty($userInfo['email'])) {
    $_SESSION['error'] = 'Google no envió la información necesaria del usuario. '
        . 'Intenta iniciar sesión nuevamente.';
    header('Location: /auth/login');
    exit;
}


/* ===============================
   VALIDACIÓN CORREO INSTITUCIONAL
   =============================== */
$email = $userInfo['email'];

if (!str_ends_with($email, '@uni.pe')) {
    $_SESSION['error'] = 'Solo se permite acceso con correo institucional UNI';
    header('Location: /auth/login');
    exit;
}



// ------------------------------------------------------
// 5) Preparar datos del usuario para la base de datos
// ------------------------------------------------------
$_SESSION['google_verify_email'] = $email;
header('Location: /auth/authenticate');
exit;