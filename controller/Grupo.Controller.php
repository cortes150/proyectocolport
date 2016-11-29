<?php
require_once 'model/grupo.php';
class GrupoController
{
    public function __CONSTRUCT(){
        $this->model = new Grupo();
    }

    public function Index(){
        require_once 'view/headers.php';
        require_once 'view/inicio.php';
        require_once 'view/grupos/grupos.php';
        require_once 'view/footer.php';
    }
    public function CrearGrupo(){
        require_once 'view/headers.php';
        require_once 'view/inicio.php';
        require_once 'view/grupos/grupos-crear.php';
        require_once 'view/footer.php';
    }
	public function GuardarZona(){
        require_once 'view/headers.php';
        require_once 'view/inicio.php';
        require_once 'view/grupos/grupos.php';
        require_once 'view/footer.php';
       // $alm = new Grupo();
        //$alm->misionID = $_REQUEST['misionID'];
        $nombre = $_REQUEST['nombre'];
        $this->model->GuardarGrupo($nombre);
    }

    public function AddColportor(){
        require_once 'view/headers.php';
        require_once 'view/inicio.php';
        require_once 'view/grupos/grupos-add-colporto.php';
        require_once 'view/footer.php';
    }
    public function AgregarColportor(){
    	$miembroID=$_POST["miembroID"];
    	$grupoID=$_POST["grupoID"];
        $this->model->GuardarMiembroGrupo($miembroID,$grupoID);
        require_once 'view/headers.php';
        require_once 'view/inicio.php';
        require_once 'view/grupos/grupos.php';
        require_once 'view/footer.php';   
    }

    public function ListaGrupo(){
        require_once 'view/headers.php';
        require_once 'view/inicio.php';
        require_once 'view/grupos/grupo-lista.php';
        require_once 'view/footer.php';
    }
}