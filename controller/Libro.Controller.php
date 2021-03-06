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
        require_once 'view/headers.php';
        require_once 'view/inicio.php';
        require_once 'view/compania/compania.php';
        //require_once 'view/libro/libro-compania.php';
        require_once 'view/footer.php';
       //session_start();
         //    ob_start();
         $nameEXCEL = $_FILES['archivo']['name'];
        $tmpEXCEL = $_FILES['archivo']['tmp_name'];
        $extEXCEL = pathinfo($nameEXCEL);
        $urlnueva = "xls/nuevo.xls";

if (($gestor = fopen($tmpEXCEL, "r")) !== FALSE) {
     while (($Exel = fgetcsv($gestor, 1000, ";","\n")) !== FALSE) {
        //$numero = count($datos);
       // echo "<p> $numero de campos en la línea $fila: <br /></p>\n";
        $Libro = new Libro();
        //$alm->misionID = $_REQUEST['misionID'];
        $Libro->titulo = $Exel['0'];
        $Libro->resumen = $Exel['1'];
        $Libro->precioOficial= $Exel['2'];
        $Libro->precioVenta= $Exel['3'];
        $Libro->companiaID=  $_REQUEST['companiaID'];
        $Libro->cantidad =$Exel['4'];
        $Libro->usuarioID=$_SESSION['usuarioID'];

        
        $Existente= $this->model->verificarExistente($Libro);
       // $alm->libroID > 0 ? $this->model->Actualizar($alm) : $this->model->GuardarLibro($alm);
        if ($Existente!=null) {
            # code...
             echo "Persona Exestente en la base de datos".'<br/>';
             echo "Nombre: ".$Existente->titulo.'<br/>';
             echo "Apellido: ".$Existente->precioOficial.'<br/>';
             echo "Ci: ".$Existente->cantidad.'<br/>';
            
        }
        else{

           $this->model->guardarLibroCvS($Libro);

        }

    }
    fclose($gestor);
} 
    
    }

    public function IntegrantesLibros(){
        require_once 'view/headers.php';
        require_once 'view/inicio-lider.php';
        
      //  $grupoID=$_REQUEST['grupoID'];
      ///  $this->model->librosIntegrantes($grupoID);
      //  $this->model->mostrarColp($grupoID);
        require_once 'view/libro/libro-integrantes.php';
        require_once 'view/footer.php';
       //$idz=$_REQUEST['zonaID'];

    }

    public function MiembroLibro(){
        $miembrosID= $_REQUEST['miembroID'];
        $librosID=$_REQUEST['libroID'];
        $cantidades=$_REQUEST['cantidad'];
        $precioLibro=$_REQUEST['precioLibro'];
        $resultado = count($cantidades);
        for ($i=0; $i <$resultado ; $i++) { 
            if ($cantidades[$i]) {
                $cantidadess[]=$cantidades[$i];
            }
        }
        $this->model->AgregarLibroColportor($miembrosID, $librosID,$cantidadess,$precioLibro);
        //http://localhost:8080/COLPORTAJE/?c=Zona&a=Index
        echo " <script>alert('Asignado con exito...'); </script> ";
        echo "<script>window.location.assign('http://localhost/Colport/?c=Zona&a=Index')</script>";
    }
}


