<?php

require_once __DIR__ . '/../core/Autoload.php';

    // Clase helper para autenticación
class Auth {
    
    // Intenta autenticar al usuario con email y contraseña
    public static function attempt(string $email): bool {

        $user = UserRepository::findByEmail($email);

        if (!$user) {
            return false;
        }

        // if (!$user->verifyPassword($password)) {
        //     return false;
        // }

        if (!$user->isActivo()) {
            return false;
        }

        self::login($user);

        return true;
    }

    // Inicia sesión para un usuario
    private static function login($user): void {

        session_regenerate_id(true);

        $_SESSION['auth'] = [
            'id'   => $user->getId(),
            'role'  => $user->getRol(),
            'code' => $user->getCodigo(),
            'name' => $user->getNombreCompleto(),
            'school' => $user->getEscuelaProfesional(),
            'type'=> $user->getTipo(),
            'relative_cycle_in_number' => $user->getCicloRelativo(),
            'relative_cycle_in_text' => $user->getCicloRelativoTexto(),
            'credits' => $user->getCreditosAprobados()
        ];
    }

    // Verifica si el usuario está autenticado
    public static function check(): bool {
        return isset($_SESSION['auth']);
    }

    public static function user(): ?array {
        return $_SESSION['auth'] ?? null;
    }

    public static function role(): ?string {
        return $_SESSION['auth']['role'] ?? null;
    }

    public static function isAdministrador(): bool {
        return self::check() && self::role() === Roles::ADMIN_TOTAL;
    }

    public static function isCoordinador(): bool {
        return self::check() && self::role() === Roles::ADMIN;
    }

    public static function isEstudiante(): bool {
        return self::check() && self::role() === Roles::STUDENT;
    }

    

    public static function requireRole(array $roles): void {
        if (!self::check() || !in_array(self::role(), $roles, true)) {
            header('HTTP/1.1 403 Forbidden');
            die('Acceso no autorizado');
        }
    }

    // Cierra la sesión del usuario
    public static function logout(): void {
        $_SESSION = [];
        session_destroy();
    }
}
