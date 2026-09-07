<?php

// Controlador para la página principal
class DetailController extends Controller {

    // Acción index
    public function course() {

        // Si el usuario NO está autenticado
        if (!Auth::check()) {
            header('Location: /auth/login'); // Redirige al login
            exit; // Detiene la ejecución
        }

        if(!Auth::isCoordinador() && !Auth::isAdministrador()) {
            header('Location: /error/error403');
            exit;
        }

        $this->view('detail/course');
    }   

}   
