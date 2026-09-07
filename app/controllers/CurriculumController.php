<?php

// Controlador para la página principal
class CurriculumController extends Controller {

    // Acción index
    public function map() {

        // Si el usuario NO está autenticado
        if (!Auth::check()) {
            header('Location: /auth/login'); // Redirige al login
            exit; // Detiene la ejecución
        }

        // Renderiza la vista home
        $this->view('curriculum/map');
    }

}   
