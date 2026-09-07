<?php

// Controlador para la página principal
class AdminController extends Controller {

    // Acción index
    public function dashboard() {

        // Si el usuario NO está autenticado
        if (!Auth::check()) {
            header('Location: /auth/login'); // Redirige al login
            exit; // Detiene la ejecución
        }

        if(!Auth::isCoordinador() && !Auth::isAdministrador()) {
            header('Location: /error/error403');
            exit;
        }

        $this->view('admin/dashboard');
    }   

    public function courses() {

        // Si el usuario NO está autenticado
        if (!Auth::check()) {
            header('Location: /auth/login'); // Redirige al login
            exit; // Detiene la ejecución
        }

        if(!Auth::isCoordinador() && !Auth::isAdministrador()) {
            header('Location: /error/error403');
            exit;
        }

        $this->view('admin/courses');
    }   

    public function students() {

        // Si el usuario NO está autenticado
        if (!Auth::check()) {
            header('Location: /auth/login'); // Redirige al login
            exit; // Detiene la ejecución
        }

        if(!Auth::isCoordinador() && !Auth::isAdministrador()) {
            header('Location: /error/error403');
            exit;
        }

        $this->view('admin/students');
    }   

    public function users() {

        // Si el usuario NO está autenticado
        if (!Auth::check()) {
            header('Location: /auth/login'); // Redirige al login
            exit; // Detiene la ejecución
        }

        if(!Auth::isAdministrador()) {
            header('Location: /error/error403');
            exit;
        }

        $this->view('admin/users');
    }   

}   
