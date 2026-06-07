<?php

class Componentes {
    public function criarHtml(string $head, string $body){
        return "
        <!DOCTYPE html>
        <html lang='pt-br'>
        " 
        . $head
        . $body
        . "</html>
        ";
    }

    public function criarHead(string $titulo){
        return "
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title> " . $titulo . "</title>
        </head>
        ";
    }

    public function criarBody(string $conteudo){
        return "
        <body>"
            . $conteudo ." 
        </body>
        ";
    }

    public function criarForm(string $action, string $metodo, array $componentes){
        $form = "<form action='". $action . "' method='". $metodo . "'>";
        $n = count($componentes);
        for ($x = 0; $x < $n; $x++){
            $form .= $componentes[$x] . "<br>";
        }
        $form .= "</form>";
        return $form;        
    }

    public function criarRotuloForm(string $rotulo, string $input){
        return "
        <label> "
        . $rotulo
        . $input
        . "</label>
        ";
    }

    public function criarInputForm(string $type, string $name){
        return "
        <input 
        type='" . $type . "'
        name='" . $name . "'
        >
        ";
    }

    public function criarInputSubmitForm(string $value, string $name){
        return "
        <input 
        type='submit'
        value='" . $value . "'
        name='" . $name . "'
        >
        ";
    }

    public function criarAviso(string $aviso, string $cor = null){
    if ($cor !== null){
        return "<hr><h3 style='border: solid 1px " . $cor . "'> ". $aviso . "</h3> <hr>";
    }    
    return "<hr><h3> " . $aviso . "</h3> <hr>";
    }
}