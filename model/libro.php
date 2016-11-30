<?php 
class Libro
{
	private $pdo;
	public $libroID;
	public $titulo;
	public $resumen;
	public $imagen;
	public $precioOficial;
	public $precioVenta;
	public $cantidad;
	public $archivo;
	public $destino;
	public $companiaID;
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

    public function GuardarLibro(Libro $datos)
	{
	try
		{
			
            $sql = "INSERT INTO libro (titulo,resumen,imagen,precioOficial,precioVenta,companiaID,cantidad)
		        VALUES ( ?, ?, ?, ?, ?,?,?)";

            $this->pdo->prepare($sql)->execute(array(
            	$datos->titulo,
            	$datos->resumen,
            	$datos->imagen,
            	$datos->precioOficial,
            	$datos->precioVenta));
		}
        catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function listarLibro(){
        try
		{
			$stm = $this->pdo->prepare("SELECT * FROM libro ORDER BY titulo ASC");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
    }

    public function verificarExistente(libro $datos){
       try
		{
			$consulta="SELECT * from libro WHERE titulo='$datos->titulo' and companiaID='$datos->companiaID'";
			$result=$this->pdo->query($consulta);
			//$alm=$this->model->$result;
			$result->execute();

			return $result->fetch(PDO::FETCH_OBJ);
		}
		catch (Exception $exception)
        {
            die($e->getMessage());
        }
    }

    public function guardarLibroCvS(libro $datos){

    	$sql = "INSERT INTO libro (titulo,resumen,precioOficial,precioVenta,companiaID,cantidad,usuarioID)
		        VALUES ( ?, ?, ?, ?, ?,?,?)";

    	try
		{

          //$date = new DateTime($datos->nacimiento);
//echo $date->format('Y-m-d');
            $this->pdo->prepare($sql)->execute(array(
            	$datos->titulo,
            	$datos->resumen,
            	$datos->precioOficial,
            	$datos->precioVenta,
            	$datos->companiaID,
            	$datos->cantidad,
            	$datos->usuarioID));
		}
        catch (Exception $e)
		{
			die($e->getMessage());
		}

    }
    public function listarCompania(){
        try
		{
			$stm = $this->pdo->prepare("SELECT * FROM compania ORDER BY nombreCampania ASC");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
    }

    public function librosIntegrantes(){
        try
		{
		    $grupoID=$_REQUEST['grupoID'];
			foreach ($grupoID as $key => $value) {
				# code...
				$stm = $this->pdo->prepare("SELECT nombre, grupoID FROM grupo where grupoID=$value");
				
				$stm->execute();
				
				$nombreGupo= $stm->fetch(PDO::FETCH_OBJ);
				$ar[]=$nombreGupo;
			}
			return $ar;
		/*
				

			$stm = $this->pdo->prepare("SELECT * FROM compania ORDER BY nombreCampania ASC");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);*/
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
    }
    public function mostrarColp($grupoID){

    	//$grupoID=$_REQUEST['grupoID'];
    	//foreach ($grupoID as $key => $value) {
    		$stm2 = $this->pdo->prepare("SELECT concat(mi.primerNombre,' ',mi.segundoNombre,' ',mi.apellido) as nombres, mi.miembroID as miembroID FROM miembrogrupo mg,miembro mi where mg.grupoId = '$grupoID'AND mi.miembroID=mg.miembroID");
				$stm2->execute();
				$colp = $stm2->fetchAll(PDO::FETCH_OBJ);
				
				return $colp;
				//$nombreColp[]=$colp->nombres;
				//$nombreColp[]=$colp->miembroID;

				//array(
            	//$colp->nombres,
            	//$colp->miembroID
            	//);

			//}
    	}
/*foreach ($miembroID as $value) {
    			$query= "INSERT INTO miembrogrupo (miembroID, grupoID)
					VALUES (?,?)";
				$this->pdo->prepare($query)->execute(array($value,$grupoID));
    		}*/

public function AgregarLibroColportor($miembrosID, $librosID, $cantidades)
	{
	try
		{
			$resultado = count($cantidades);
			//$CantMiembros=count($miembroID);

			foreach ($miembrosID as $value) {
				
				for ($i=0; $i <$resultado ; $i++) { 
				$sql="INSERT INTO miembrolibro(cantidad,miembroID,libroID) VALUES('$cantidades[$i]','$value','$librosID[$i]')";
				 $this->pdo->prepare($sql)->execute();

				$consul="SELECT cantidad from libro where libroID=$librosID[$i]";
				$result=$this->pdo->query($consul);
				$result->execute();

			$CantidadActual = $result->fetch(PDO::FETCH_OBJ);
				$resulA=$CantidadActual->cantidad-$cantidades[$i];
				$sql2="UPDATE libro SET cantidad = '$resulA' WHERE libroID = '$librosID[$i]'";
				$result2=$this->pdo->query($sql2);
				$result2->execute();
				}
			}


			
		}
	catch (Exception $e)
		{
			die($e->getMessage());
		}
	


    	}}
 ?>