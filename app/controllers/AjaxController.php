<?php

// Controlador para la página principal
class AjaxController extends Controller {
    // Acción index
    public function enroll() {

        // Si el usuario NO está autenticado
        if (!Auth::check()) {
            header('Location: /auth/login'); // Redirige al login
            exit; // Detiene la ejecución
        }

        // Renderiza la vista home
        $this->view('ajax/enroll');
    }

    public function void() {

        // Si el usuario NO está autenticado
        if (!Auth::check()) {
            header('Location: /auth/login'); // Redirige al login
            exit; // Detiene la ejecución
        }

        // Renderiza la vista home
        $this->view('ajax/void');
    }

}   
