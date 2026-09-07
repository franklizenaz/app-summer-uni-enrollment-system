<?php

require_once __DIR__ . '/../../core/Autoload.php';

// Validar método HTTP
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(403); // o 405 si prefieres semántica estricta
    header('Location: /error/error403');
    exit;
}


$student = $_SESSION['auth']['code'] ?? null;
$coursesJson = $_POST['courses'] ?? null;
$courses = json_decode($coursesJson, true);

if (!$student || !is_array($courses)) {
    http_response_code(400); // o 405 si prefieres semántica estricta
    header('Location: /error/error400');
    exit;
}

if (count($courses) > 2) {
    http_response_code(400); // o 405 si prefieres semántica estricta
    header('Location: /error/error400');
    exit;
}

$repo = new EnrollStudentsRepository();


foreach ($courses as $course) {
    if ( $repo->verifyAlreadyEnrollOfIn($student, $course) ) {
        http_response_code(400); // o 405 si prefieres semántica estricta
        $_SESSION['already_course_code'] = $course;
        header('Location: /advice/already');
        exit;
    }
}

$actuales = $repo->countCoursesByStudent($student);
$nuevos = count($courses);

if ($actuales + $nuevos > 2) {
    http_response_code(400);
    header('Location: /advice/limit');
    exit;
}


try {
    $repo = new EnrollmentRepository();
    $repo->enrollCourses($student, $courses);

    $_SESSION['enroll_success'] = 'El proceso de matrícula se completó correctamente.';

    try {
        header('Location: /profile/mycourses');
        exit;
    } catch (\Exception $e) {
        unset($_SESSION['enroll_success']);
        throw new \Exception($e->getMessage());
    }


} catch (Exception $e) {
    http_response_code(400); // o 405 si prefieres semántica estricta
    header('Location: /error/error400');
    exit;
}
