<?php

class Course {
    private $escuela;
    private string $codigo;
    private string $nombre;
    private int $ciclo;
    private int $creditos;
    private string $prerequisitos;
    private array $arrayPrerequisitos;
    private string $tipo; // Obligatorio o Electivo

    public function __construct(
        string $escuela,
        string $codigo,
        string $nombre,
        int $ciclo,
        int $creditos,
        string $prerequisitos,
        array $arrayPrerequisitos,
        string $tipo
    ) {
        $this->escuela = $escuela;
        $this->codigo = $codigo;
        $this->nombre = $nombre;
        $this->ciclo = $ciclo;
        $this->creditos = $creditos;
        $this->prerequisitos = $prerequisitos;
        $this->arrayPrerequisitos = $arrayPrerequisitos;
        $this->tipo = $tipo;
    }

    public function getEscuela(): string {
        return $this->escuela;
    }

    public function getCodigo(): string {
        return $this->codigo;
    }

    public function getNombre(): string {
        return $this->nombre;
    }

    public function getCiclo(): int {
        return $this->ciclo;
    }

    public function getCreditos(): int {
        return $this->creditos;
    }

    public function getPrerequisitos(): string {
        return $this->prerequisitos;
    }

    public function getArrayPrerequisitos(): array {
        return $this->arrayPrerequisitos;
    }

    public function setArrayPrerequisitos(array $arrayPrerequisitos): void {
        $this->arrayPrerequisitos = $arrayPrerequisitos;
    }

    public function getTipo(): string {
        return $this->tipo;
    }


}
