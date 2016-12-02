<?php
require_once 'model/reporte.php';
class ReporteController
{
    public function __CONSTRUCT(){
        $this->model = new Reporte();
    }

    public function Index(){
        require_once 'view/headers.php';
        require_once 'view/inicio.php';
        require_once 'view/reporte/reportezona.php';
        require_once 'view/footer.php';

    }
}