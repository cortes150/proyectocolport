<?php
require_once 'model/reporte.php';
class ReporteController
{
    public function __CONSTRUCT(){
        $this->model = new Reporte();
    }

    public function Index(){
        //$reporte = new Reporte();
        $id=$_REQUEST['id'];
        $idz=$_REQUEST['idz'];
        /*if(isset($_REQUEST)){
            $alm = $this->model->Obtener($_REQUEST['id']);
        }*/
        $alm = $this->model->Reportezona($id, $idz);
        //$alm[] = $this->model->Reportezona($id, $idz);
        //$nom = $alm[0];
        //$Existente= $this->model->verificarExistente($colportor);
       // $alm->libroID > 0 ? $this->model->Actualizar($alm) : $this->model->GuardarLibro($alm);
        //if ($Existente!=null) {
            # code...
            //echo "Persona Exestente en la base de datos".'<br/>';
            //foreach ($alm as $row) {
               // echo 'nombre: '.$row['lider'].'<br/>';
              //  echo 'zona: '.$row['zona'].'<br/>';
    //}
        require_once 'view/headers.php';
        require_once 'view/inicio.php';
        require_once 'view/reporte/reportezona.php';
        require_once 'view/footer.php';

    }
}