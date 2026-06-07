<?php

require_once("../template/componentes.php");

class TemplateMedia {
    public function iniciarTemplate(Componentes $componentes, bool $erro = null, string $msg = null){
        // 3 campos de entrada
        $input_n1 = $componentes->criarInputForm("text", "inputPrimeiraNota");
        $input_n2 = $componentes->criarInputForm("text", "inputSegundaNota");
        $input_n3 = $componentes->criarInputForm("text", "inputTerceiraNota");

        // 3 rotulos de entrada
        $n1 = $componentes->criarRotuloForm("Informe a 1° nota: ", $input_n1);
        $n2 = $componentes->criarRotuloForm("Informe a 2° nota: ", $input_n2);
        $n3 = $componentes->criarRotuloForm("Informe a 3° nota: ", $input_n3);

        // evento submit
        $submit = $componentes->criarInputSubmitForm("Calcular Media", "media");

        if ($erro !== null){
            if ($erro){
                $aviso = $componentes->criarAviso($msg, "red");    
            } else {
                $aviso = $componentes->criarAviso($msg, "green");
            }
            // vetor de componentes do formulario
            $elementos = [$aviso, $n1, $n2, $n3, $submit];
        } else {
            $elementos = [$n1, $n2, $n3, $submit];
        }
        
        // criar formulario
        $form = $componentes->criarForm("../controller/calcularMedia.php", 'post', $elementos);

        // criar body
        $body = $componentes->criarBody($form);

        // criar head
        $head = $componentes->criarHead("Calcular média");

        // criar html
        $html = $componentes->criarHtml($head, $body);

        return $html;
    }
}