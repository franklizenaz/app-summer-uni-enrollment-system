<?php
    //Require autoload de Composer .env
    require_once __DIR__ . '/../vendor/autoload.php';
    //Cargamos entorno de trabajo .env

    //     // ❌ Esto fuerza a cargar .env (causa el error)
    // $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
    // $dotenv->load();

    // ✅ Esto lo hace opcional
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
    $dotenv->safeLoad();


    // Obtener credenciales de entorno
    defined('DB_URL') || define('DB_URL', $_ENV['TURSO_DATABASE_URL'] ?? null);
    defined('DB_TOKEN') || define('DB_TOKEN', $_ENV['TURSO_AUTH_TOKEN'] ?? null);

    // Validar existencia de credenciales
    if (!DB_URL || !DB_TOKEN) {
        die("Error: Credenciales no definidas en .env.");
    }
    
?>

<?php

    defined('GOOGLE_CLIENT_ID') || define('GOOGLE_CLIENT_ID', $_ENV['GOOGLE_CLIENT_ID'] ?? null);
    defined('GOOGLE_CLIENT_SECRET') || define('GOOGLE_CLIENT_SECRET', $_ENV['GOOGLE_CLIENT_SECRET'] ?? null);
    defined('GOOGLE_REDIRECT_URI') || define('GOOGLE_REDIRECT_URI', $_ENV['GOOGLE_REDIRECT_URI'] ?? null);

    defined('GOOGLE_TOKEN_URL') || define('GOOGLE_TOKEN_URL', $_ENV['GOOGLE_TOKEN_URL'] ?? null);
    defined('GOOGLE_USERINFO_URL') || define('GOOGLE_USERINFO_URL', $_ENV['GOOGLE_USERINFO_URL'] ?? null);

?>
