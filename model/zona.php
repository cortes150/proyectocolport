<?php 
class Zona
{
	private $pdo;
	public $colportorID;
	public $zonaID;

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

	public function Actualizar(Zona $datos){
        try
		{
			$stm = $this->pdo->prepare("UPDATE colportor SET zonaID = '$datos->zonaID', estado='no' WHERE colportorID = '$datos->colportorID'");
			$zon = $this->pdo->prepare("UPDATE zona SET estado = 'no' WHERE zonaID = '$datos->zonaID'");

			$stm->execute();
			$zon->execute();

			return $zon->fetch(PDO::FETCH_OBJ);
			return $stm->fetch(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
    }

	public function listarColportorLider(){
        try
		{
			$stm = $this->pdo->prepare("SELECT `liderID` AS id, CONCAT(`nombre`, ' ',`apellido`) AS Nombre FROM `lider`  ORDER BY Nombre ASC");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
    }

    public function listarZonas(){
        try
		{
			$stm = $this->pdo->prepare("SELECT `zonaID`, `nombre` FROM `zona` WHERE estado='si'");
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
			/*$stm = $this->pdo->prepare("SELECT colportorID AS id, CONCAT(primer, ' ',segundo, ' ',paterno, ' ',materno) AS Nombre , zonaID as nombre, rol FROM colportor col  WHERE rol='lider' and zonaID is not NULL ORDER BY Nombre ASC");*/
			/*$stm = $this->pdo->prepare("SELECT CONCAT(primer,' ',segundo,' ',paterno,' ',materno) as Nombre, zo.nombre, col.rol from colportor col, zona zo WHERE rol='lider' AND col.zonaID is not null and col.zonaID=zo.zonaID ORDER by Nombre ASC");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);*/
			$stm = $this->pdo->prepare("SELECT li.liderID id, zo.nombre name, li.nombre as nameli FROM  zona zo, lider li where zo.liderID=li.liderID ORDER BY name ASC");
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

