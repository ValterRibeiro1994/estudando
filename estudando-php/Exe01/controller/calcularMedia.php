<?php

require_once("../template/appTemplate.php");
$template = new AppTemplate("media");

if ($_SERVER['REQUEST_METHOD'] === 'GET'){
    // pagina requisitada sem envio de dados
    echo($template->iniciarTemplate());
    exit();
} else if ($_SERVER['REQUEST_METHOD'] === "POST"){
    // checa se o calculo é para Media ou para recuperação
    if (isset($_POST['media'])){
        // captura os dados de entrada
        $n1 = $_POST['inputPrimeiraNota'] ?? ""; // operador ternario
        $n2 = $_POST['inputSegundaNota'] ?? ""; // operador ternario
        $n3 = $_POST['inputTerceiraNota'] ?? ""; // operador ternario
        
        $notas = [$n1, $n2, $n3];
        $somar = 0;
        for ($x = 0; $x < 3; $x++){
            $nota = $notas[$x]; // armazena a nota atual temporiamente
            
            // verifica se o valor é numerico
            if (!is_numeric($nota)){
                echo($template->iniciarTemplate(true, "Todas as notas devem receber valores númericos !!!"));
                exit();
            }
    
            // converte a string de entrada para numero real
            $num = floatval($nota);
    
            // verifica se o numero está no intervalo de 0 a 10
            if ($num < 0 || $num > 10){
                echo($template->iniciarTemplate(true, "Todas as notas deve estar no intervalo de 0 a 10 !!!"));
                exit();
            }

            // soma a nota
            $somar = $somar + $num;
        }
    
        // calcula a média do aluno
        $media = $somar / 3;
        
        // aluno reprovado diretamente
        if ($media <= 3){
            echo($template->iniciarTemplate(false, "Aluno Reprovado !!! \n" . "Nota Final: " . number_format($media, 2)));
            exit();
        } else if ($media >= 6){
            echo($template->iniciarTemplate(false, "Aluno Aprovado !!! \n" . "Nota Final: " . number_format($media, 2)));
            exit();
        } else {
            // criar formulario de recuperação
            $template = new AppTemplate("recuperacao");
            echo($template->iniciarTemplate());
            exit();
        }

    } else if (isset($_POST['recuperacao'])){
        
        // captura a nota de recuperação
        $nota = $_POST['inputRecuperacaoNota'] ?? "";
        if (!is_numeric($nota)){
            $template->iniciarTemplate(true, "Nota de recuperação deve receber apenas números!!!");
            exit();
        }
        // converte a string de entrada para numero real
        $num = floatval($nota);

        // verifica se o numero está no intervalo de 0 a 10
        if ($num < 0 || $num > 10){
            echo($template->iniciarTemplate(true, "Todas as notas deve estar no intervalo de 0 a 10 !!!"));
            exit();
        }

        // se a nota for maior que 5 o aluno está aprovado
        if ($num > 5){
            echo($template->iniciarTemplate(false, "Aluno Aprovado !!! \n" . "Nota Final: " . number_format($num, 2)));
        } else {
            echo($template->iniciarTemplate(false, "Aluno Reprovado !!! \n" . "Nota Final: " . number_format($num, 2)));
        }

        exit();
    }
}