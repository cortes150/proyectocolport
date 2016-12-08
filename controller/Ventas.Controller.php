<?php
require_once 'model/ventas.php';

//require_once 'model/zona.php';
class VentasController
{
    public function __CONSTRUCT(){
        $this->model = new Ventas();
    }
public function index(){
        require_once 'view/headers.php';
        require_once 'view/inicio-colportor.php';
        require_once 'view/ventas/index.php';
        require_once 'view/footer.php';
    }
public function ClienteFormulario(){
        require_once 'view/headers.php';
        require_once 'view/inicio-colportor.php';
        require_once 'view/ventas/cliente.php';
        require_once 'view/footer.php';
    }
}
