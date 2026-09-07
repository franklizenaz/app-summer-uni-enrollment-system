<?php

/**
 * google_auth.php
 * ---------------------------------
 * Inicia el flujo de autenticación con Google (OAuth 2.0).
 *
 * Genera un "state" aleatorio para evitar ataques CSRF,
 * arma la URL de autorización y redirige al usuario a Google.
 */
ob_start(); // inicia el buffer de salida
session_start(); // ❗ obligatorio antes de usar $_SESSION
require_once __DIR__ . "/../../core/Autoload.php";
require_once __DIR__ ."/../../../config/config.php";


// ------------------------------------------------------
// Generar un "state" aleatorio (protección CSRF)
// ------------------------------------------------------
$state = bin2hex(random_bytes(16));
$_SESSION['oauth2_state'] = $state;

// ------------------------------------------------------
// Definir los parámetros de autorización para Google
// ------------------------------------------------------
// - scope: pedimos acceso a email, nombre y foto de perfil
// - prompt: "consent" fuerza el selector de cuenta
// - access_type: "offline" permite refrescar el token si se necesitara
$params = [
    'response_type' => 'code',
    'client_id'     => GOOGLE_CLIENT_ID,
    'redirect_uri'  => GOOGLE_REDIRECT_URI,
    'scope'         => 'email profile',
    'state'         => $state,
    'access_type'   => 'offline',
    'prompt'        => 'consent',
];

// ------------------------------------------------------
// Construir la URL de login y redirigir al usuario
// ------------------------------------------------------
$authUrl = 'https://accounts.google.com/o/oauth2/v2/auth?' . http_build_query($params);

header('Location: ' . $authUrl);
exit;
ob_end_flush();