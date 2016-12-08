<?php 

class Ventas
{

   public $primer;
   public $segundo;
   public $paterno;
   public $materno;
   public $direccion;
   public $fono;
   public $zonaCliente;
   public $usuarioID;
	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = Database::StartUp();
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	
    public function litarLibros(){///actualizarce automaticamente
        try
		{
			$id=$_SESSION['miembroID'];

			$stm = $this->pdo->prepare("SELECT l.titulo,l.libroID,l.precioVenta,mi.cantidad from miembrolibro mi, libro l WHERE mi.miembroID='$id' and mi.libroID=l.libroID GROUP by titulo");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
			
    }

    public function CrearCliente(Ventas $cliente){///actualizarce automaticamente
        try
		{
				$sql = "INSERT INTO cliente (primer,segundo,paterno,materno,direccion,fono,zonaCliente,usuarioID)
		        VALUES (?,?,?,?,?,?,?,?)";

            $this->pdo->prepare($sql)->execute(array(
            	$cliente->primer,
            	$cliente->segundo,
            	$cliente->paterno,
            	$cliente->materno,
           		$cliente->direccion,
            	$cliente->fono,
            	$cliente->zonaCliente,
            	$cliente->usuarioID));
            echo "<script>alert('Usuario Creado con exito!!!')</script>";
		}
        catch (Exception $e)
		{
			die($e->getMessage());
		}
			
    }
     public function listarClietes(){///actualizarce automaticamente
        try
		{
			$id=$_SESSION['usuarioID'];

			$stm = $this->pdo->prepare("SELECT CONCAT(primer,' ',paterno) as nombres,clienteID FROm cliente WHERE usuarioID = '$id'");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
			
    }

    public function VenderTo($libroID,$CantidadVenta,$Monto,$clienteID,$TipoDePago){///actualizarce automaticamente
        try
		{
			$ids=$_SESSION['usuarioID'];
			$fecha = date("Y-m-d");
			//ingresar Venta
			

				// $sql = "INSERT INTO venta (usuarioID,clienteID)
		  //       VALUES (ids,$clienteID)";

    //         $this->pdo->prepare($sql)->execu

            $inserVenta=$this->pdo->prepare("INSERT INTO venta (usuarioID,clienteID,fecha)
		        VALUES ($ids,$clienteID,NOW())");
			$inserVenta->execute();

			$stm = $this->pdo->prepare("select ventaID from venta WHERE usuarioID='$ids' order by ventaID DESC limit 1");
				$stm->execute();
				$ventaID = $stm->fetch(PDO::FETCH_OBJ);

				//$total=$precioVenta->precioVenta*$CantidadVenta;
			 
			
			
			//sacar el precio de libro
			
				$stm = $this->pdo->prepare("SELECT precioVenta FROm libro WHERE libroID = '$libroID'");
				$stm->execute();
				$precioVenta = $stm->fetch(PDO::FETCH_OBJ);

				$total=$precioVenta->precioVenta*$CantidadVenta;
			
			
			//venderlibro ventaLibro
				
				$inserVentaLibro=$this->pdo->prepare("INSERT INTO ventalibro (ventaID,libroID,cantidad,precio,total)
		        VALUES ($ventaID->ventaID,$libroID,$CantidadVenta,$precioVenta->precioVenta,$total)");
			$inserVentaLibro->execute();


			//pago

			$inserPago=$this->pdo->prepare("INSERT INTO pago (ventaID,usuarioID,TipoDePago)
		        VALUES ('$ventaID->ventaID','$ids','$TipoDePago')");
			$inserPago->execute();

			$stme = $this->pdo->prepare("select pagoID from pago WHERE usuarioID='$ids' order by ventaID DESC limit 1");
				$stme->execute();
				$pagoID = $stme->fetch(PDO::FETCH_OBJ);
			//pagocliente
 
            $pagocliente=$this->pdo->prepare("INSERT INTO pagocliente (pagoID,clienteID,fecha,Monto)
		        VALUES ('$pagoID->pagoID','$clienteID',NOW(),$Monto)");
			$pagocliente->execute();
			

			
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
			
    }

    public function ListarMiembros(){
        try
		{
			$id=$_SESSION['miembroID'];
       	$sql=$this->pdo->prepare("SELECT grupoID FROM `miembrogrupo` WHERE miembroID='$id'");
    	$sql->execute();

		$companiaID =$sql->fetch(PDO::FETCH_OBJ);
		$sq=$this->pdo->prepare("SELECT CONCAT(mi.primerNombre,' ', mi.segundoNombre) as nombre, mi.apellido as apellid, gr.nombre as grupos, mi.foto foto FROM miembrogrupo mg, miembro mi, grupo gr WHERE mg.grupoID='$companiaID->grupoID' AND gr.grupoID=mg.grupoID and mi.miembroID=mg.miembroID ORDER BY apellid");
    	$sq->execute();
		return $sq->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
    }
}

 ?>