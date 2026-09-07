<?php

abstract class User {

    protected int $id;
    protected string $codigo;        // Código institucional
    protected string $nombres;
    protected string $apellidos;
    protected string $email;
    protected string $passwordHash;
    protected string $rol;
    protected string $estado;         // activo -> true | inactivo -> false

    public function __construct(
        int $id,
        string $codigo,
        string $nombres,
        string $apellidos,
        string $email,
        string $passwordHash,
        string $rol,
        string $estado
    ) {
        $this->id = $id;
        $this->codigo = $codigo;
        $this->nombres = $nombres;
        $this->apellidos = $apellidos;
        $this->email = $email;
        $this->passwordHash = $passwordHash;
        $this->rol = $rol;
        $this->estado = $estado;
    }

    public function isActivo(): bool {
        return $this->estado === 'active';
    }

    public function verifyPassword(string $password): bool {
        return password_verify($password, $this->passwordHash);
    }

    public function getCodigo(): string {
        return strtoupper($this->codigo);
    }


    public function getNombreCompleto(): string {
        return strtoupper("{$this->nombres} {$this->apellidos}");
    }

    public function getRol(): string {
        return $this->rol;
    }


    public function getId(): int {
        return $this->id;
    }
    public function getNombres(): string {
        return $this->nombres;
    }
    public function getApellidos(): string {
        return $this->apellidos;
    }
    public function getEmail(): string {
        return $this->email;
    }
    

}
