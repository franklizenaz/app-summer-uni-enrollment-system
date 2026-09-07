<?php

// Controlador para la página principal
class ProfileController extends Controller {

    // Acción index
    public function mycourses() {

        // Si el usuario NO está autenticado
        if (!Auth::check()) {
            header('Location: /auth/login'); // Redirige al login
            exit; // Detiene la ejecución
        }

        // Renderiza la vista home
        $this->view('profile/mycourses');
    }
}
