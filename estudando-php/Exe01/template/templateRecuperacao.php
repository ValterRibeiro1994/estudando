<?php

require_once("../template/componentes.php");

class TemplateRecuperacao {
    public function iniciarTemplate(Componentes $componentes, bool $erro = null, string $msg = null){
        // 1 campo de entrada
        $input_n1 = $componentes->criarInputForm("text", "inputRecuperacaoNota");
        
        // 1 rotulo de entrada
        $n1 = $componentes->criarRotuloForm("Informe a nota de recuperação: ", $input_n1);
        
        // evento submit
        $submit = $componentes->criarInputSubmitForm("Verificar Recuperação", "recuperacao");

        if ($erro !== null){
            if ($erro){
                $aviso = $componentes->criarAviso($msg, "red");    
            } else {
                $aviso = $componentes->criarAviso($msg, "green");
            }
            // vetor de componentes do formulario
            $elementos = [$aviso, $n1, $submit];
        } else {
            $elementos = [$n1, $submit];
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