<?php
 
class InicioController
{
    private $model;


    public function Index(){
        require_once 'view/headers.php';
        //require_once 'view/inicio.php';
        require_once 'view/bienvenido.php';
        require_once 'view/footer.php';
    }

    public function Bienvenido(){

          
        require_once 'view/headers.php';
        require_once 'view/inicio.php';
        //require_once 'view/cuerpo.php';
        require_once 'view/compania/compania.php';
        require_once 'view/footer.php';
    }

    public function Login(){
        require_once 'view/headers.php';
        //require_once 'view/inicio.php';
        require_once 'view/index.php';
        require_once 'view/footer.php';

    }
     public function LoginExit(){
        require_once 'view/usuario/salirlogin.php';
        //require_once 'view/inicio.php';
        

    }
    
}