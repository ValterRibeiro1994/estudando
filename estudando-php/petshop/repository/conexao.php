<?php
require_once("../petshop/model/respostaFuncao.php");
class Conexao {
    // dados do banco
    private string $host;
    private string $database;
    private string $user;
    private string $password;

    // comandos Sql
    private string $conexaoStr; // string de conexão
    private string $comandoSql; // string de comando
    private PDO $conexao;

    public function __construct(){
        $this->host = "localhost";
        $this->database = "petshop_db";
        $this->user = "root";
        $this->password = "";
        $this->conexaoStr = "mysql:host=$this->host;dbname=$this->database;charset=utf8";
    }

    private function conectarBd(): array{
        try {
            $this->conexao = new PDO($this->conexaoStr, $this->user, $this->password);
            $this->conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return RespostaFuncao::respostaFuncao(true, "Conexão bem sucedida");
        } catch (PDOException $erro){
            $msg = $erro->getMessage();
            return RespostaFuncao::respostaFuncao(false, "Erro de conexão: $msg");
        }
    }

    public function obterTutorCpf(CPF $cpf): array {
        // iniciar conexão
        $conectar = $this->conectarBd();
        if (!$conectar['resposta']){
            return $conectar;
        }
        
        try {
            $this->comandoObterTutorCpf(); // cria str de comando
            $sql = $this->conexao->prepare($this->comandoSql);
            $sql->bindValue(":cpf", $cpf->getCpf());
            $sql->execute();
            if ($sql->rowCount() == 0){
                return RespostaFuncao::respostaFuncao(false, "Tutor não Registrado no sistema");
            }

            $dados = $sql->fetch(PDO::FETCH_ASSOC);
            return RespostaFuncao::respostaFuncao(true, "Tutor Localizado", $dados);
        } catch (Exception $erro){
            return RespostaFuncao::respostaFuncao(false, $erro->getMessage());
        }

    }


    // comandos sql para suas funções
    private function limparComando(): void{
        $this->comandoSql = "";
    }

    private function comandoObterTutorCpf(): void{
        $this->limparComando();
        $this->comandoSql = "SELECT ";
        $this->comandoSql .= "nome_tutor as 'Nome', ";
        $this->comandoSql .= "email_tutor as 'Email', ";
        $this->comandoSql .= "cpf_tutor as 'Cpf', ";
        $this->comandoSql .= "celular_tutor as 'Telefone de contato' ";
        $this->comandoSql .= "FROM tb_tutor WHERE cpf_tutor = :cpf";
    }

    
}