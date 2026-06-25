<?php


class RespostaFuncao {
    public static function respostaFuncao(bool $response, string $mensage = "", array $dados = []): array {
        return ['resposta'=>$response, 'mensagem'=>$mensage, 'dados'=>$dados];
    }
}