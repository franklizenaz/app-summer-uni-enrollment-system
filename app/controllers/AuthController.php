<?php
// Controlador de autenticación
class AuthController extends Controller {

    public function login() {  
        $this->show('auth/login'); // Renderiza la vista de login
    }
    
    public function google() {
        $this->show('auth/google');
    }

    public function callback() {
        $this->show('auth/callback');
    }

    // Procesa el login
    public function authenticate() {

        //verificar que es un email válido
        $email = $_SESSION['google_verify_email'] ?? '';
        unset($_SESSION['google_verify_email']);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->show('auth/login', ['error' => 'Email inválido']);
            return;
        }

        $pass = $_POST['pass'] ?? '';

        //chequea las credenciales
        if (Auth::attempt($email)) {
            // Si es correcto, redirige al home
            header('Location: /home/index');
            return;
        }

        // Si falla, vuelve al login con error
        $this->show('auth/login', ['error' => 'Credenciales inválidas']);
    }

    // Cierra sesión
    public function logout() {

        // Ejecuta el logout
        Auth::logout();

        // Redirige al login
        header('Location: /auth/login');
    }
}
