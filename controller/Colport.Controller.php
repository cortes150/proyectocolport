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

if (($gestor = fopen($tmpEXCEL, "r")) !== FALSE) {
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
            # code...
             echo "Persona Exestente en la base de datos".'<br/>';
             echo "Nombre: ".$Existente->primerNombre.'<br/>';
             echo "Apellido: ".$Existente->apellido.'<br/>';
             echo "Ci: ".$Existente->ci.'<br/>';
            
        }
        else{

            $this->model->guardarColpotor($Miembro);

        }

    }
    fclose($gestor);
}
   
        
        //require_once 'view/cuerpo.php';
        require_once 'view/colportor/Colportor.php';
        require_once 'view/footer.php';


       
}}

