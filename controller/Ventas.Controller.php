<?php
require_once 'model/ventas.php';

//require_once 'model/zona.php';
class VentasController
{
   
    public function __CONSTRUCT(){
        $this->model = new Ventas();
    }
public function index(){
        require_once 'view/headers.php';
        require_once 'view/inicio-colportor.php';
        require_once 'view/ventas/index.php';
        require_once 'view/footer.php';
    }
public function ClienteFormulario(){
        require_once 'view/headers.php';
        require_once 'view/inicio-colportor.php';
        require_once 'view/ventas/cliente.php';
        require_once 'view/footer.php';
    }

public function CrearCli(){
        require_once 'view/headers.php';
        require_once 'view/inicio-colportor.php';
        require_once 'view/ventas/index.php';
        require_once 'view/footer.php';
 
        $cliente= new ventas();
        $cliente->primer = $_REQUEST['primer'];
        $cliente->segundo = $_REQUEST['segundo'];
        $cliente->paterno = $_REQUEST['paterno'];
        $cliente->materno = $_REQUEST['materno'];
        $cliente->direccion = $_REQUEST['direccion'];
        $cliente->fono = $_REQUEST['fono'];
        $cliente->zonaCliente = $_REQUEST['zonaCliente'];
        $cliente->usuarioID = $_SESSION['usuarioID'];
        $this->model->CrearCliente($cliente);

    }

    public function Vender(){

        require_once 'view/headers.php';
        $libroID=$_REQUEST['LibroID'];
        $CantidadVenta=$_REQUEST['CantidadVenta'];
        $Monto=$_REQUEST['Monto'];
        $clienteID = $_REQUEST['clienteID'];
        //$precioVenta=$_REQUEST['precioVenta'];
        $TipoDePago=$_REQUEST['TipoDepago'];
        
        
        //$ids=$_SESSION['usuarioID'];
        $this->model->VenderTo($libroID,$CantidadVenta,$Monto,$clienteID,$TipoDePago);
        // echo "LibroID".$LibroID;
        // echo "CantidadVenta";.$CantidadVenta;
        // echo "Monto".$Monto;
        // echo "clienteID".$clienteID;
        // echo "precioVenta".$precioVenta;
        // echo "TipoDepagoCo".$TipoDepagoCo;
        // echo "TipoDepagoCr".$TipoDepagoCr;
        
        require_once 'view/inicio-colportor.php';
        require_once 'view/ventas/cliente.php';
        require_once 'view/footer.php';
    }

public function Integrantes(){
        require_once 'view/headers.php';
        require_once 'view/inicio-colportor.php';
        require_once 'view/ventas/integrantesGrupo.php';
        require_once 'view/footer.php';
    }
}
