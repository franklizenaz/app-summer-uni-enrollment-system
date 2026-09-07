<?php

// Controlador para la página principal
class ErrorController extends Controller {

    public function error400() {

        // Si el usuario NO está autenticado
        if (!Auth::check()) {
            header('Location: /auth/login'); // Redirige al login
            exit; // Detiene la ejecución
        }

        // Renderiza la vista home
        $this->show('error/400');
    }

    public function error403() {

        // Si el usuario NO está autenticado
        if (!Auth::check()) {
            header('Location: /auth/login'); // Redirige al login
            exit; // Detiene la ejecución
        }

        // Renderiza la vista home
        $this->show('error/403');
    }

    public function error404() {

        // Si el usuario NO está autenticado
        if (!Auth::check()) {
            header('Location: /auth/login'); // Redirige al login
            exit; // Detiene la ejecución
        }

        // Renderiza la vista home
        $this->show('error/404');
    }


}   
