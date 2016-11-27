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
}

 ?>