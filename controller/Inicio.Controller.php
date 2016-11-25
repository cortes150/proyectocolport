<?php

class InicioController
{
    private $model;


    public function Index(){
        require_once 'view/header.php';
        require_once 'view/inicio.php';
        require_once 'view/index.php';
        require_once 'view/footer.php';
    }

    public function Bienvenido(){
        require_once 'view/header.php';
        require_once 'view/inicio.php';
        //require_once 'view/cuerpo.php';
        require_once 'view/bienvenido.php';
        require_once 'view/footer.php';
    }
    
}