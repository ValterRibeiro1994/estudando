<?php

require_once("../petshop/model/cpf.php");
require_once("../petshop/model/Texto.php");

$cpf = new CPF("078-451-799-14");
echo($cpf->getCpf());

$texto = new Texto();

echo("<br>");
echo($texto->validarLimite("12"));
echo("<br>");
echo($texto->validarLimite("12345", 4));