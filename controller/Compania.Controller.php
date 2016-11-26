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
        $Compania = new Compania();

        //$alm->misionID = $_REQUEST['misionID'];
        $Compania->nombreCampania = $_REQUEST['nombreCampania'];
        //$alm->coordinadorID = $_REQUEST['coordinadorID'];
        $Compania->fechaInicio = $_REQUEST['fechaInicio'];
        $Compania->fechaFin = $_REQUEST['fechaFin'];
        $Compania->temporada = $_REQUEST['temporada'];
        $Compania->estado = $_REQUEST['estado'];
        $Compania->mision=$_REQUEST['mision'];

        $this->model->GuardarCompania($Compania);
       // $Compania->misionID > 0 ? $this->model->Actualizar($Compania) : $this->model->GuardarCompania($Compania);
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