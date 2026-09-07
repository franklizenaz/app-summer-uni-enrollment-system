<?php

// Controlador base del sistema
class Controller {

    // Método para renderizar vistas
    protected function view($view, $data = []) {
        extract($data); // Convierte el array de datos en variables
        ob_start(); // Inicia el buffer de salida

        require "../app/views/$view.php"; // Carga la vista específica
        $content = ob_get_clean(); // Guarda el contenido renderizado

        require "../app/views/layouts/main.php"; // Carga el layout principal con el contenido
    }

    protected function show($view, $data = []) {
        extract($data); // Convierte el array de datos en variables
        require "../app/views/$view.php"; // Carga la vista específica
    }
}
