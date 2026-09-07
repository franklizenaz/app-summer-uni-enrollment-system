<?php

class Roman {

    static public function Numeral(int $num): string
    {
        $map = [
            1=>'I',2=>'II',3=>'III',4=>'IV',5=>'V',
            6=>'VI',7=>'VII',8=>'VIII',9=>'IX',10=>'X'
        ];
        return $map[$num] ?? (string)$num;
    }

}