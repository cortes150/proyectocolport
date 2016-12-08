<?php 
class Compania
{
	private $pdo;
	//public $misionID;
	public $nombreCampania;
	//public $coordinadorID;
	public $fechaInicio;
	public $fechaFin;
	public $temporada;
	public $estado;
	public $mision;

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

	public function listarCoodinador(){
        try
		{
			$stm = $this->pdo->prepare("SELECT * FROM coordinador");///ordenar alf
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
    }

    public function GuardarCompania(Compania $datos)
	{
		try
		{
			//session_start();
    		//ob_start();
            $sql = "INSERT INTO compania (nombreCampania,fechaInicio,fechaFinal,temporada,estado,mision,usuarioID)
		        VALUES ( ?, ?, ?, ?, ?,?,?)";

            $this->pdo->prepare($sql)->execute(array(
            	$datos->nombreCampania,
            	$datos->fechaInicio,
            	$datos->fechaFin,
            	$datos->temporada,
            	$datos->estado,
            	$datos->mision,
            	$_SESSION['usuarioID']));
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

    public function listarAsignados(){///actualizarce automaticamente
        try
		{
			$stm = $this->pdo->prepare("SELECT li.liderID id, zo.zonaID idz, zo.nombre name, li.nombre as nameli FROM  zona zo, lider li where zo.liderID=li.liderID ORDER BY name ASC");
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