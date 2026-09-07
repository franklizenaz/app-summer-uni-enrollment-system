<?php 

class RelativeCycle {

    public static function calcularCicloRelativo(string $escuelaProfesional, int $creditosAprobados): int {
        
        if ($escuelaProfesional === 'Estadística') {
            return match (true) {
                $creditosAprobados <= 24 => 1, //Si el numero de créditos aprobados es menor o igual a 24, el ciclo es 1
                $creditosAprobados <= 48 => 2, //Si el numero de créditos aprobados es menor o igual a 48, el ciclo es 2
                $creditosAprobados <= 73 => 3, //Si el numero de créditos aprobados es menor o igual a 73, el ciclo es 3
                $creditosAprobados <= 98 => 4, //Si el numero de créditos aprobados es menor o igual a 98, el ciclo es 4
                $creditosAprobados <= 121 => 5, //Si el numero de créditos aprobados es menor o igual a 121, el ciclo es 5
                $creditosAprobados <= 143 => 6, //Si el numero de créditos aprobados es menor o igual a 143, el ciclo es 6
                $creditosAprobados <= 167 => 7, //Si el numero de créditos aprobados es menor o igual a 167, el ciclo es 7
                $creditosAprobados <= 181 => 8, //Si el numero de créditos aprobados es menor o igual a 181, el ciclo es 8
                $creditosAprobados <= 184 => 9,  //Si el numero de créditos aprobados es menor o igual a 184, el ciclo es 9
                $creditosAprobados <= 197 => 10, //Si el numero de créditos aprobados es menor o igual a 197, el ciclo es 10
                default => 11, //Si el numero de créditos aprobados es mayor a 197, el ciclo es 11
            };
        } elseif ($escuelaProfesional === 'Económica') {
            return match (true) {
                $creditosAprobados <= 24 => 1, //Si el numero de créditos aprobados es menor o igual a 24, el ciclo es 1
                $creditosAprobados <= 45 => 2, //Si el numero de créditos aprobados es menor o igual a 45, el ciclo es 2
                $creditosAprobados <= 67 => 3, //Si el numero de créditos aprobados es menor o igual a 67, el ciclo es 3
                $creditosAprobados <= 90 => 4, //Si el numero de créditos aprobados es menor o igual a 90, el ciclo es 4
                $creditosAprobados <= 112 => 5, //Si el numero de créditos aprobados es menor o igual a 112, el ciclo es 5
                $creditosAprobados <= 131 => 6, //Si el numero de créditos aprobados es menor o igual a 131, el ciclo es 6
                $creditosAprobados <= 150 => 7, //Si el numero de créditos aprobados es menor o igual a 150, el ciclo es 7
                $creditosAprobados <= 169 => 8, //Si el numero de créditos aprobados es menor o igual a 169, el ciclo es 8
                $creditosAprobados <= 188 => 9,  //Si el numero de créditos aprobados es menor o igual a 188, el ciclo es 9
                $creditosAprobados <= 207 => 10, //Si el numero de créditos aprobados es menor o igual a 207, el ciclo es 10
                default => 11, //Si el numero de créditos aprobados es mayor a 207, el ciclo es 11
            };
        } else {
            throw new InvalidArgumentException('Escuela profesional inválida');
        }
        
    }
}