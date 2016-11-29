<?php
require_once 'model/zona.php';

//require_once 'model/zona.php';
class ZonaController
{
    public function __CONSTRUCT(){
        $this->model = new Zona();
    }

    public function guardar(){
        require_once 'view/headers.php';
        require_once 'view/inicio.php';
        require_once 'view/lideres/zona.php';
        
        $zona = new Zona();
        $zona->colportorID=$_REQUEST['colportorID'];
        $zona->zonaID=$_REQUEST['zonaID'];
        //$zona-> 
        //$this->model->Actualizar($zona); 
       //$zona->colportorID > 0 ? 
       $this->model->Actualizar($zona);
       //: $this->model->GuardarUsuario($zona);

        require_once 'view/lideres/listaZona.php';
        require_once 'view/footer.php';
    }

    public function Inicio(){
        require_once 'view/headers.php';
        require_once 'view/inicio.php';
        require_once 'view/lideres/zona.php';
        require_once 'view/footer.php';
    }

    public function CrearZona(){
        require_once 'view/headers.php';
        require_once 'view/inicio.php';
        require_once 'view/lideres/zona-crear.php';
        require_once 'view/footer.php';
    }

    public function zonasLIstadas(){
        require_once 'view/headers.php';
        require_once 'view/inicio.php';
        require_once 'view/lideres/listaZona.php';
        require_once 'view/footer.php';
    }
    public function GuardarZona(){
        require_once 'view/headers.php';
        require_once 'view/inicio.php';
        $idc=$_POST['companiaID'];
        $name=$_POST['nombre'];
        $this->model->CrearZonaa($idc, $name);
        //require_once 'view/compania/compania.php';
        echo "<script>window.location.assign('http://localhost:8080/COLPORTAJE/?c=Compania&a=Index')</script>";
        
        require_once 'view/footer.php';
    }
}

/*$alm = new Usuario();
        //$alm->misionID = $_REQUEST['misionID'];
        $alm->nick = $_REQUEST['nick'];
        $alm->clave = $_REQUEST['clave'];
        $alm->pass_cifrado = password_hash($alm->clave, PASSWORD_DEFAULT, array("cost"=>12));
        $alm->usuarioID > 0 ? $this->model->Actualizar($alm) : $this->model->GuardarUsuario($alm);*/
        