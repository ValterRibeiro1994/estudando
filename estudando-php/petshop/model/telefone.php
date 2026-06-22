<?php

class Telefone
{
    private string $telefone;

    public function __construct(string $telefone)
    {
        $telefone = $this->limparTelefone($telefone);

        if (!$this->validarTelefone($telefone)) {
            throw new Exception("Telefone inválido.");
        }

        $this->telefone = $telefone;
    }

    public function getTelefone(): string
    {
        return $this->telefone;
    }

    private function validarTelefone(string $telefone): bool
    {
        $n = strlen($telefone);

        if ($n !== 10 && $n !== 11) {
            return false;
        }

        if ($telefone[0] === '0' || $telefone[2] === '0') {
            return false;
        }

        if ($n === 11 && $telefone[2] !== '9') {
            return false;
        }

        if (!$this->validarSequencia($telefone)) {
            return false;
        }

        return true;
    }

    private function validarSequencia(string $telefone): bool
    {
        return !preg_match('/^(\d)\1+$/', $telefone);
    }

    private function limparTelefone(string $telefone): string
    {
        $telefone_limpo = "";
        $n = strlen($telefone);
        for ($x = 0; $x < $n; $x++){
            if (ctype_digit($telefone[$x])){
                $telefone_limpo .= $telefone[$x];
            }
        }
        return $telefone_limpo;
    }
}