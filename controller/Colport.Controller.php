<?php
require_once 'model/colportor.php';
class ColportController
{
    public function __CONSTRUCT(){
        $this->model = new Colportor();
    }

    public function Index(){

        require_once 'view/headers.php';
        require_once 'view/inicio.php';
        //require_once 'view/cuerpo.php';
        require_once 'view/colportor/Colportor.php';
        require_once 'view/footer.php';
    }

    public function Subir(){
        require_once 'view/headers.php';
        require_once 'view/inicio.php';
//if(isset($_POST['radio'])){
        //subir la imagen del articulo
        $nameEXCEL = $_FILES['archivo']['name'];
        $tmpEXCEL = $_FILES['archivo']['tmp_name'];
        $extEXCEL = pathinfo($nameEXCEL);
        $urlnueva = "xls/nuevo.xls";

 //class="modal fade bs-example-modal-sm in" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="false" style="display: block;"
///class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"><div class="modal-dialog modal-sm" role="document"><div class="modal-content">

if (($gestor = fopen($tmpEXCEL, "r")) !== FALSE) {
    echo '<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">';
    echo '<h4 class="text-center">Persona Existente en la base de datos</h4> <div class="container">';
    echo '<h5>_________________________________</h5><dl>';
     while (($Exel = fgetcsv($gestor, 1000, ";","\n")) !== FALSE) {
        //$numero = count($datos);
       // echo "<p> $numero de campos en la línea $fila: <br /></p>\n";
        $Miembro = new Colportor();
        //$alm->misionID = $_REQUEST['misionID'];
        $Miembro->primerNombre = $Exel['0'];
        $Miembro->segundoNombre = $Exel['1'];
        $Miembro->apellido= $Exel['2'];
        $Miembro->ci= $Exel['3'];
        $Miembro->nacimiento=$Exel['4'];
        $Miembro->pais =$Exel['5'];
        $Miembro->ciudad=$Exel['6'];
        $Miembro->universidad=$Exel['7'];
        $Miembro->facultad=$Exel['8'];
        $Miembro->carrera=$Exel['9'];
        
        $Existente= $this->model->verificarExistente($Miembro);
       // $alm->libroID > 0 ? $this->model->Actualizar($alm) : $this->model->GuardarLibro($alm);
        if ($Existente!=null) {
        
            echo "<dt>Nombre</dt><dd>".$Existente->primerNombre.'</dd>';
            echo "<dt>Apellido</dt><dd>".$Existente->apellido.'<dd>';
            echo "<dt>Ci</dt><dd>".$Existente->ci.'</dd>';
        }
        else{
            $this->model->guardarColpotor($Miembro);
        }
    }echo '<h5>_________________________________</h5></dl><hr>';
    echo '</div></div></div></div>';
    fclose($gestor);
}        //require_once 'view/cuerpo.php';
        require_once 'view/colportor/Colportor.php';
        require_once 'view/footer.php';      
}

    public function Inicio(){

        require_once 'view/headers.php';
        require_once 'view/inicio-colportor.php';
        //require_once 'view/cuerpo.php';
        require_once 'view/colportor/index.php';
        //require_once 'view/lideres/miembroLibroDetalleAsignado.php';
        require_once 'view/footer.php';
    }

    public function LibrosCampaña(){

        require_once 'view/headers.php';
        require_once 'view/inicio-colportor.php';
        //require_once 'view/cuerpo.php';
        require_once 'view/colportor/Colportor-libros-campania.php';
        //require_once 'view/lideres/miembroLibroDetalleAsignado.php';
        require_once 'view/footer.php';
    }
}    