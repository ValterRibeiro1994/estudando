<?php

require_once("../petshop/model/cpf.php");
require_once("../petshop/model/email.php");
require_once("../petshop/model/telefone.php");
require_once("../petshop/model/nome.php");

class Tutor { 
    private CPF $cpf;
    private Email $email;
    private Telefone $telefone;
    private Nome $nome;

    public function getNome(): string {
        return $this->nome->getNome();
    }

    public function getTelefone(): string {
        return $this->telefone->getTelefone();
    }

    public function getEmail(): string {
        return $this->email->getEmail();
    }

    public function getCpf(): string {
        return $this->cpf->getCpf();
    }

    public function setNome(Nome $nome): void {
        $this->nome = $nome;
    }

    public function setTelefone(Telefone $tel): void {
        $this->telefone = $tel;
    }

    public function setEmail(Email $email): void {
        $this->email = $email;
    }

    public function setCpf(CPF $cpf): void {
        $this->cpf = $cpf;
    }

}