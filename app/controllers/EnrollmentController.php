<?php

// Controlador para la página principal
class EnrollmentController extends Controller {

    public function panel() {

        // Si el usuario NO está autenticado
        if (!Auth::check()) {
            header('Location: /auth/login'); // Redirige al login
            exit; // Detiene la ejecución
        }

        // Renderiza la vista home
        $this->view('enrollment/panel');
    }

    // Acción index
    public function prestart() {

        // Si el usuario NO está autenticado
        if (!Auth::check()) {
            header('Location: /auth/login'); // Redirige al login
            exit; // Detiene la ejecución
        }

        // Renderiza la vista home
        $this->view('enrollment/prestart');
    }

}   
