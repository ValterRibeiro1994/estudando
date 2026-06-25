<?php

class CPF {
    private string $cpf;
    public function __construct(string $cpf)
    {
        // limpa pontos e traços do cpf
        $cpf = $this->limparCpf($cpf);

        // if (!$this->validarCpf($cpf)){
        //     throw new Exception("Cpf Invalido !!!");
        // }
        $this->cpf = $cpf;
    }

    public function getCpf(): string {
        return $this->cpf;
    }

    private function validarCpf(string $cpf){
        
        
        // verifica se existe 11 caracteres númericos
        $n = strlen($cpf);
        if ($n != 11){ // se não tem 11 caracteres
            return false;
        }

        // Impede números repetidos inválidos (Ex: 111.111.111-11)
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }

        // calcular o primeiro e segundo digito
        $primeiro = $this->calcularDigitoVerificador($cpf, 10, 9);
        $segundo = $this->calcularDigitoVerificador($cpf, 11, 10);
        return $primeiro == $cpf[9] and $segundo == $cpf[10];
            
        
    }

    private function limparCpf(string $cpf): string {
        $cpf_limpo = "";
        $n = strlen($cpf);
        for ($x = 0; $x < $n; $x++){
            if (ctype_digit($cpf[$x])){
                $cpf_limpo .= $cpf[$x];
            }
        }
        return $cpf_limpo;
    }

    private function calcularDigitoVerificador(string $cpf, int $peso, int $loop): int {
        $soma = 0;
        for ($x = 0; $x < $loop; $x++){
            $numero = (int) $cpf[$x];
            $soma = $soma + ($numero * $peso);
            $peso = $peso - 1; 
        }

        $resto = $soma % 11;
        if ($resto < 2){
            return 0;
        } else {
            return 11 - $resto;
        }
    }


}