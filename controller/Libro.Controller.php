<?php
require_once 'model/libro.php';
class LibroController
{
    public function __CONSTRUCT(){
        $this->model = new Libro();
    }

    public function Index(){
        require_once 'view/header.php';
        require_once 'view/inicio.php';
        require_once 'view/libro/libro.php';
        require_once 'view/footer.php';

    }

    public function Crear(){
        require_once 'view/header.php';
        require_once 'view/inicio.php';
        require_once 'view/libro/libro-crear.php';
    }

    public function Guardar(){
        require_once 'view/header.php';
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
        if(isset($_POST['radio'])){
        //subir la imagen del articulo
        $nameEXCEL = $_FILES['archivo']['name'];
        $tmpEXCEL = $_FILES['archivo']['tmp_name'];
        $extEXCEL = pathinfo($nameEXCEL);
        $urlnueva = "xls/nuevo.xls";            
        if(is_uploaded_file($tmpEXCEL)){
            copy($tmpEXCEL,$urlnueva);  
            echo '<div align="center">Datos Actualizados con Exito</div>';
        }
        
    }
    if(isset($_POST['radio'])){
            require_once 'PHPExcel/Classes/PHPExcel/IOFactory.php';
            
            $objPHPExcel = PHPExcel_IOFactory::load('xls/nuevo.xls');
            $objHoja=$objPHPExcel->getActiveSheet()->toArray(null,true,true,true,true,true);
            foreach ($objHoja as $iIndice=>$objCelda) {
    
                        echo '
                            <tr>
                                <td>'.$objCelda['A'].'</td>
                                <td>'.$objCelda['B'].'</td>
                                <td>'.$objCelda['C'].'</td>
                                <td>'.$objCelda['D'].'</td>
                                <td>'.$objCelda['E'].'</td>
                                <td>'.$objCelda['F'].'</td>
                                <td>'.$objCelda['G'].'</td>
                            </tr>
                        ';
                $id=$objCelda['A'];         $nombre=$objCelda['B'];
                $direccion=$objCelda['C'];  $correo=$objCelda['D'];
                $telefono=$objCelda['E'];   $ocupacion=$objCelda['F'];
                $estado=$objCelda['G']; 
                                    
                if($_POST['radio']=='s'){
                    $sql="INSERT INTO libro 
                    (libroID, titulo, resumen, imagen, oficial, venta) 
                        VALUES  ('$libroID','$titulo','$resumen','$imagen','$oficial','$venta')";
                        mysql_query($sql);
                }
                    }
            }
        require_once 'view/header.php';
        require_once 'view/inicio.php';
        require_once 'view/libro/libro.php';
        $alm = new Libro();
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
}