<?php

require_once __DIR__ . '/../../core/Autoload.php';

// Validar método HTTP
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(403); // o 405 si prefieres semántica estricta
    header('Location: /error/error403');
    exit;
}


$student = $_SESSION['auth']['code'] ?? null;
$course = $_POST['code'] ?? null;

if (!$student || !$course) {
    http_response_code(400); // o 405 si prefieres semántica estricta
    header('Location: /error/error400');
    exit;
}

try {
    $repo = new EnrollmentRepository();
    $repo->voidCourse($student, $course);

    $_SESSION['void_success'] = 'La matrícula se anuló correctamente.';

    try {
        header('Location: /profile/mycourses');
        exit;
    } catch (\Exception $e) {
        unset($_SESSION['void_success']);
        throw new \Exception($e->getMessage());
    }


} catch (Exception $e) {
    http_response_code(400); // o 405 si prefieres semántica estricta
    header('Location: /error/error400');
    exit;
}
