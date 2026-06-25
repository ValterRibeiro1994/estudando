<?php
require_once("../petshop/model/texto.php");
class Nome {
    private string $nome;

    public function __construct(string $nome){
        $texto = new Texto();
        if (!$texto->validarLimite($nome, 80)){
            throw new Exception("Nome Invalido");
        }
        $this->nome = $nome;
    }

    public function getNome(){
        return $this->nome;
    }

}