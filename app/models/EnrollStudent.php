<?php

require_once __DIR__ . '/../core/Autoload.php';

class EnrollStudent extends Student {

    private string $courseCode;
    // private array $cursosAprobados = [];

    public function __construct(
        int $id,
        string $codigoEstudiante, //foreign key
        string $nombres,
        string $apellidos,
        string $email,
        string $passwordHash,
        string $rol,
        string $estado,
        string $escuelaProfesional,
        string $tipoAlumno,
        int $creditosAprobados,
        string $courseCode
    ) {
        parent::__construct(
            $id,
            $codigoEstudiante,
            $nombres,
            $apellidos,
            $email,
            $passwordHash,
            $rol,
            $estado,
            $escuelaProfesional,
            $tipoAlumno,
            $creditosAprobados,
        );

        $this->courseCode = $courseCode;
    }

    public function getCourseCode(): string {
        return $this->courseCode;
    }
}
