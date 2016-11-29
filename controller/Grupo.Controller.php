<?php
require_once 'model/grupo.php';
class GrupoController
{
    public function __CONSTRUCT(){
        $this->model = new Grupo();
    }

    public function Index(){
        require_once 'view/headers.php';
        require_once 'view/inicio-lider.php';
        require_once 'view/grupos/grupos.php';
        require_once 'view/footer.php';
    }
    public function CrearGrupo(){
        require_once 'view/headers.php';
        require_once 'view/inicio.php';
        require_once 'view/grupos/grupos-crear.php';
        require_once 'view/footer.php';
    }
	public function GuardarGrupoC(){
        require_once 'view/headers.php';
        require_once 'view/inicio.php';
        //require_once 'view/grupos/grupos.php';
        require_once 'view/footer.php';
       // $alm = new Grupo();
        //$alm->misionID = $_REQUEST['misionID'];
        $nombre = $_REQUEST['nombre'];
        $idz= $_REQUEST['zonaID'];
        $this->model->GuardarGrupoM($nombre,$idz);
         
        echo "<script>window.location.assign('http://localhost:8080/COLPORTAJE/?c=Grupo&a=Index&idz=$idz')</script>";
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
        $idz= $_REQUEST['idz'];
        $this->model->GuardarMiembroGrupo($miembroID,$grupoID);
       /* require_once 'view/headers.php';
        require_once 'view/inicio.php';
        require_once 'view/grupos/grupos.php';
        require_once 'view/footer.php';*/
        echo "<script>window.location.assign('http://localhost:8080/COLPORTAJE/?c=Grupo&a=Index&idz=$idz')</script>";   
    }

    public function ListaGrupo(){
        require_once 'view/headers.php';
        require_once 'view/inicio-lider.php';
        require_once 'view/grupos/grupo-lista.php';
        require_once 'view/footer.php';
    }
}