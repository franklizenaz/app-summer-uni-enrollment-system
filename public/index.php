<?php
// Inicia o reanuda la sesión PHP
ob_start();
session_start();
require_once __DIR__ . '/../app/core/Autoload.php';


require dirname(__DIR__) . '/vendor/autoload.php';

// // ❌ Esto fuerza a cargar .env (causa el error)
// $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
// $dotenv->load();

// ✅ Esto lo hace opcional
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->safeLoad();


// Carga el autoload de clases
require_once __DIR__ . '/../app/core/Autoload.php';

// Crea una instancia de la aplicación
$app = new App();
$app->run();

