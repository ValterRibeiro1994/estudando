<?php 

require_once("../template/componentes.php");
require_once("../template/templateMedia.php");
require_once("../template/templateRecuperacao.php");

class AppTemplate {
    private Componentes $componentes;
    private $pagina;
    public function __construct(string $pagina){
        $this->componentes = new Componentes();
        $this->pagina = new TemplateMedia();
        if ($pagina === "media"){
            $this->pagina = new TemplateMedia();
        } else {
            // criar form recuperação
            $this->pagina = new TemplateRecuperacao();
        }
    }

    public function iniciarTemplate(bool $erro = null, string $msg = null){
        if ($erro !== null){
            return $this->pagina->iniciarTemplate($this->componentes, $erro, $msg);
        }
        return $this->pagina->iniciarTemplate($this->componentes);
    }
}