<?php 
class Compania
{
	private $pdo;
	public $misionID;
	public $nombreCompania;
	public $coordinadorID;
	public $inicio;
	public $fin;
	public $temporada;
	public $estado;

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
            $sql = "INSERT INTO compania (nombreCompania,coordinadorID,inicio,fin,temporada,estado)
		        VALUES ( ?, ?, ?, ?, ?, ?)";

            $this->pdo->prepare($sql)->execute(array(
            	$datos->nombreCompania,
            	$datos->coordinadorID,
            	$datos->inicio,
            	$datos->fin,
            	$datos->temporada,
            	$datos->estado));
		}
        catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function listarCompania(){
        try
		{
			$stm = $this->pdo->prepare("SELECT * FROM compania ORDER BY nombreCompania ASC");
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