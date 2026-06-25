<?php


class Componentes {
    

    public function tituloPagina(string $titulo = "PetShop", string $classe = ""){
        return "<h1 class='$classe'> $titulo </h1>";
    }


}