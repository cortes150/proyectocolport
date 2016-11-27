<?php
require_once 'model/libro.php';
class LibroController
{
    public function __CONSTRUCT(){
        $this->model = new Libro();
    }

    public function Index(){
        require_once 'view/headers.php';
        require_once 'view/inicio.php';
        require_once 'view/libro/libro.php';
        require_once 'view/footer.php';

    }

    public function Crear(){
        require_once 'view/headers.php';
        require_once 'view/inicio.php';
        require_once 'view/libro/libro-crear.php';
    }

    public function Guardar(){
        require_once 'view/headers.php';
        require_once 'view/inicio.php';
        require_once 'view/libro/libro.php';
        require_once 'view/footer.php';
        $alm = new Libro();
        //$alm->misionID = $_REQUEST['misionID'];
        $alm->titulo = $_REQUEST['titulo'];
        $alm->resumen = $_REQUEST['resumen'];
        $alm->oficial = $_REQUEST['oficial'];
        $alm->venta = $_REQUEST['venta'];
        $alm->destino = $_FILES['imagen']['tmp_name'];
        $alm->imagen ="view/libro/img/".$_FILES['imagen']['name'];
        //move_uploaded_file($alm->destino, $alm->imagen);
        move_uploaded_file($alm->imagen, $alm->destino);
        $alm->libroID > 0 ? $this->model->Actualizar($alm) : $this->model->GuardarLibro($alm);
        //header('Location: view/mision/mision.php');
    }

    public function agregarLibro(){
       
    }
}