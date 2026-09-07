<?php

require_once __DIR__ . '/../core/Autoload.php';

class Student extends User {

    private string $escuelaProfesional; // Estadística o Económica
    private string $tipoAlumno; // Regular o Reincorporado
    private int $creditosAprobados;
    private int $cicloRelativo;
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
    ) {
        parent::__construct(
            $id,
            $codigoEstudiante,
            $nombres,
            $apellidos,
            $email,
            $passwordHash,
            $rol,
            $estado
        );

        // if (!preg_match('/^[0-9]{8}[A-Z]$/', $codigoEstudiante)) {
        //     throw new InvalidArgumentException('Código de estudiante inválido');
        // }
            
        $this->escuelaProfesional = $escuelaProfesional;
        $this->tipoAlumno = $tipoAlumno;
        $this->creditosAprobados = $creditosAprobados;
        $this->cicloRelativo = RelativeCycle::calcularCicloRelativo($escuelaProfesional,$creditosAprobados);
    }

    public function getEscuelaProfesional(): string {
        return $this->escuelaProfesional;
    }

    public function getTipo(): string {
        return $this->tipoAlumno;
    }

    public function getCicloRelativo(): int {
        return $this->cicloRelativo; 
    }

    public function getCicloRelativoTexto(): string {
        switch($this->cicloRelativo) {
            case 1: return "1ro"; break;
            case 2: return "2do"; break;
            case 3: return "3ro"; break;
            case 4: return "4to"; break;
            case 5: return "5to"; break;
            case 6: return "6to"; break;
            case 7: return "7mo"; break;
            case 8: return "8vo"; break;
            case 9: return "9no"; break;
            case 10:return "10mo"; break;
            default: throw new Exception("Error al obtener Ciclo Relativo");
        }
    }

    public function getCreditosAprobados(): int {
        return $this->creditosAprobados;
    }



    // public function puedeMatricularseEn(Course $curso): bool {

    //     if (!$this->isActivo()) {
    //         return false;
    //     }

    //     if ($curso->getCiclo() > $this->cicloActual) {
    //         return false;
    //     }

    //     foreach ($curso->getPrerequisitos() as $req) {
    //         if (!in_array($req, $this->cursosAprobados, true)) {
    //             return false;
    //         }
    //     }

    //     return true;
    // }

    // public function agregarCursoAprobado(string $codigoCurso): void {
    //     $this->cursosAprobados[] = $codigoCurso;
    // }
}
