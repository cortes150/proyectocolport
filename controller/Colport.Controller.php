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



if(isset($_POST['radio'])){
        //subir la imagen del articulo
        $nameEXCEL = $_FILES['archivo']['name'];
        $tmpEXCEL = $_FILES['archivo']['tmp_name'];
        $extEXCEL = pathinfo($nameEXCEL);
        $urlnueva = "xls/nuevo.xls";


// $fichero = new SplFileObject($tmpEXCEL);
// $fichero->setFlags(SplFileObject::READ_CSV);
// foreach ($fichero as $fila) {
//     list($animal, $clase, $patas) = $fila;
//     printf("Un %s es un %s con %d patas\n", $animal, $clase, $patas);
// }
//  $fila = 1;
if (($gestor = fopen($tmpEXCEL, "r")) !== FALSE) {
     while (($datos = fgetcsv($gestor, 1000, ";","\n")) !== FALSE) {
        $numero = count($datos);
       // echo "<p> $numero de campos en la línea $fila: <br /></p>\n";
$colportor = new Colportor();
        //$alm->misionID = $_REQUEST['misionID'];
        $colportor->nombre = $datos[0];
        $colportor->apellido = $datos[1];
        $colportor->ci= $datos[2];
        $colportor->nacimiento=$datos[3];
        $colportor->pais= $datos[4];
        $colportor->ciudad = $datos[5];
        $colportor->universidad =$datos[6];
        $colportor->facultad=$datos[7];
        //move_uploaded_file($alm->destino, $alm->imagen);
        //move_uploaded_file($alm->imagen, $alm->destino);
        $Existente= $this->model->verificarExistente($colportor);
       // $alm->libroID > 0 ? $this->model->Actualizar($alm) : $this->model->GuardarLibro($alm);
        if ($Existente!=null) {
            # code...
            echo "Persona Exestente en la base de datos".'<br/>';
            foreach ($Existente as $row) {
       
        echo 'nombre: '.$row['nombre'].'<br/>';
        echo 'apellido: '.$row['apellido'].'<br/>';
        echo 'ci: '.$row['ci'].'<br/>';
        echo "<hr/>";
    }
        }
        else{

            $this->model->guardarColpotor($colportor);

        }



        // $fila++;
        // for ($c=0; $c < $numero; $c++) {
        //     echo $datos[$c] . "<br />\n";


        // }
       // echo "\n<br />------";
    }
    fclose($gestor);
}


//Lo recorremos
// while (($datos = fgetcsv($archivos, ";")) == true) 
// {
//   $num = count($datos);
//   $linea++;
//   //Recorremos las columnas de esa linea
//   for ($columna = 0;$num > $columna ; $columna++) 
//       {
//          echo $datos[$columna] . "\n";
//      }
// }
// //Cerramos el archivo
// fclose($archivos);    

}
        require_once 'view/headers.php';
        require_once 'view/inicio.php';
        //require_once 'view/cuerpo.php';
        require_once 'view/colportor/Colportor.php';
        require_once 'view/footer.php';
}}

