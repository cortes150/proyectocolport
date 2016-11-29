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
			$sql="INSERT into miembrozona ( miembroID, zonaID) values (?,?)";
			//$sql="INSERT into zona (nombre, usuarioID, companiaID) values (?, ?, ?)";
			$this->pdo->prepare($sql)->execute(array(
				$datos->miembroID,
				$datos->zonaID));
		echo "<script> alert('Lider asignado a zona...');</script>";
			/*$stm = $this->pdo->prepare("UPDATE colportor SET zonaID = '$datos->zonaID', estado='no' WHERE colportorID = '$datos->colportorID'");
			$zon = $this->pdo->prepare("UPDATE zona SET estado = 'no' WHERE zonaID = '$datos->zonaID'");

			$stm->execute();
			$zon->execute();

			return $zon->fetch(PDO::FETCH_OBJ);
			return $stm->fetch(PDO::FETCH_OBJ);*/
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
    }

	public function listarColportorLider(){
        try
		{	//SELECT * FROM usuarioo WHERE tipo='lider' AND miembroID NOT IN (SELECT miembrogrupo.miembroID FROM miembrogrupo)
			//$stm = $this->pdo->prepare("SELECT mi.miembroID as id, CONCAT(mi.primerNombre,' ',mi.segundoNombre,' ',mi.apellido ) as Nombre FROM usuarioo uss, miembro mi WHERE  mi.miembroID = uss.miembroID ORDER BY Nombre ASC"
				//SELECT `usuarioID` AS id, CONCAT(`nick`, ' ',`tipo`) AS Nombre FROM `usuarioo`  ORDER BY nick ASC);
		//SELECT * FROM usuarioo WHERE tipo='lider' AND miembroID NOT IN (SELECT miembrozona.miembroID FROM miembrozona)
		$stm = $this->pdo->prepare("SELECT mi.miembroID as id, CONCAT(mi.primerNombre,' ',mi.segundoNombre,' ',mi.apellido) as Nombre FROM usuarioo us, miembro mi WHERE us.tipo='lider' AND us.miembroID NOT IN (SELECT miembrozona.miembroID FROM miembrozona) and mi.miembroID=us.miembroID");
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
		{ //SELECT * FROM zona WHERE zonaID NOT IN (SELECT miembrozona.zonaID FROM miembrozona)
			$stm = $this->pdo->prepare("SELECT `zonaID`, `nombre` FROM `zona` WHERE zonaID NOT IN (SELECT miembrozona.zonaID FROM miembrozona)");
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

   public function CrearZonaa($idc, $name){
        try
		{
		$usu=$_SESSION['usuarioID'];
   		$sql="INSERT into zona (nombre, usuarioID, companiaID) values (?, ?, ?)";
			$this->pdo->prepare($sql)->execute(array(
				$name,
				$usu,
				$idc));
		echo "<script> alert('Zona Creada...');</script>";
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
    }
}
?>

