<?php
require_once 'model/compania.php';

class CompaniaController
{
    public function __CONSTRUCT(){
        $this->model = new Compania();
    }

    public function Guardar(){
        require_once 'view/headers.php';
        require_once 'view/inicio.php';
        require_once 'view/compania/compania.php';
        require_once 'view/footer.php';
        $alm = new Compania();
        //$alm->misionID = $_REQUEST['misionID'];
        $alm->nombreCompania = $_REQUEST['nombreCompania'];
        $alm->coordinadorID = $_REQUEST['coordinadorID'];
        $alm->inicio = $_REQUEST['inicio'];
        $alm->fin = $_REQUEST['fin'];
        $alm->temporada = $_REQUEST['temporada'];
        $alm->estado = $_REQUEST['estado'];
        $alm->misionID > 0 ? $this->model->Actualizar($alm) : $this->model->GuardarCompania($alm);
        //header('Location: view/mision/mision.php');
    }

    public function Index(){
        require_once 'view/headers.php';
        require_once 'view/inicio.php';
        require_once 'view/compania/compania.php';
        require_once 'view/footer.php';
    }

    public function Crear(){
        require_once 'view/headers.php';
        require_once 'view/inicio.php';
        require_once 'view/compania/compania-crear.php';
        require_once 'view/footer.php';
    }

    public function story(){
        require_once 'view/headers.php';
        require_once 'view/inicio.php';
        require_once 'view/compania/companiaListarZonas.php';
        require_once 'view/footer.php';
    }
    
}