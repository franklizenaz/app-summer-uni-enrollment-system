<?php

// Clase encargada de resolver la URL
class Router {

    // Método que decide controlador y método
    public function dispatch() {

        // Obtiene la URL desde REQUEST_URI para URLs amigables
        $url = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

        $segments = explode('/', $url); // Divide la URL en segmentos


        $controllerName = ucfirst($segments[0] ?: 'home') . 'Controller';// Construye el nombre del controlador (HomeController por defecto)
        $method = $segments[1] ?? 'index'; // Define el método a ejecutar (index por defecto)

        // Verifica que el controlador exista
        if (!class_exists($controllerName)) {
            header('Location: /error/error404');
            exit;
        }

        // Instancia el controlador
        $controller = new $controllerName();

        // Verifica que el método exista en el controlador
        if (!method_exists($controller, $method)) {
            header('Location: /error/error404');
            exit;
        }
        
        // Ejecuta el método del controlador
        $controller->$method();
    }
}