<?php

class Texto {
    public function validarLimite(string $texto, int $max = 30, int $min = 3){
        $n = strlen($texto);
        return ($n > $max || $n < $min);
    }
}