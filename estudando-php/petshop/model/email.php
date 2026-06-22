<?php 

class Email {
    private string $email;
    private array $dominios_permitidos = [
        "@gmail",
        "@hotmail",
        "@yahoo",
        "@aluno.cps.sp"
    ];

    public function __construct(string $email)
    {
        if (!$this->validarEmail($email)){
            throw new Exception("Email Inválido");
        }
        $this->email = $email;
    }

    public function getEmail(): string {
        return $this->email;
    }
    
    private function validarDominio(string $email): bool {
        $n = count($this->dominios_permitidos);
        for ($x = 0; $x < $n; $x++){
            if (str_contains($email, $this->dominios_permitidos[$x])){
                return true;
            }
        }
        return false;
    }

    private function sanitizarEmail(string $email): string {
        return filter_var($email, FILTER_SANITIZE_EMAIL);
    }

    private function validarEmail(string $email): bool {
        if (!$this->validarDominio($email)){
            return false;
        }

        return filter_var($this->sanitizarEmail($email), FILTER_VALIDATE_EMAIL);
    }
}