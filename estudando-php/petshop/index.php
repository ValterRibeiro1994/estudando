<?php

require_once("../petshop/model/cpf.php");
require_once("../petshop/model/Texto.php");
require_once("../petshop/repository/conexao.php");

// echo($cpf->getCpf());

$texto = new Texto();

$conexao = new Conexao();
try {
    $cpf = new CPF("58225745906");
    echo("CPF: " . $cpf->getCpf() ."<br>");
    $tutor = $conexao->obterTutorCpf($cpf);
    if (!$tutor['resposta']){
        echo($tutor['mensagem'] . "<br>");
    } else {
        echo($tutor['mensagem'] . "<br>");
        foreach ($tutor['dados'] as $key => $value){
            echo("<br>$key: $value");
        }

    }
} catch (Exception $erro){
    echo($erro->getMessage());
}

