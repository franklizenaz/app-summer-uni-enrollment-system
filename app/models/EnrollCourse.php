<?php

class EnrollCourse extends Course {

    private string $estado;
    private int $cantidadEstimadaEstudiantes;
    private $prematriculados;
    private string $nombreProfesor;
    private $estadoProfesor;

    public function __construct(
        string $escuela,
        string $codigo,
        string $nombre,
        int $ciclo,
        int $creditos,
        string $prerequisitos,
        array $arrayPresequisitos,
        string $tipo,
        string $estado,
        int $cantidadEstimadaEstudiantes,
        $prematriculados,
        string $nombreProfesor,
        $estadoProfesor,
    ) {
        parent::__construct(
                            $escuela,
                            $codigo,
                            $nombre,
                            $ciclo,
                            $creditos,
                            $prerequisitos,
                            $arrayPresequisitos,
                            $tipo
                            );
        $this->estado = $estado;
        $this->cantidadEstimadaEstudiantes = $cantidadEstimadaEstudiantes;
        $this->prematriculados = $prematriculados;
        $this->nombreProfesor = $nombreProfesor;
        $this->estadoProfesor = $estadoProfesor;
    }
    public function getEstado(): string {
        return $this->estado;
    }

    public function getCantidadEstimadaAlumnos(): int {
        return $this->cantidadEstimadaEstudiantes;
    }

    public function getPrematriculados() {
        return $this->prematriculados;
    }

    public function getNombreProfesor(): string {
        return $this->nombreProfesor;
    }

    public function getEstadoProfesor() {
        return $this->estadoProfesor;
    }
}
