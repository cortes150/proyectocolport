<?php 

class Grupo
{

	private $pdo;
	public $miembroID;
	public $grupoID;
	public $array;

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

	public function Reportezona($id, $idz){
        try
		{
			$query = $this->pdo->prepare("SELECT * from lider WHERE liderID='$id'");
			$query2 = $this->pdo->prepare("SELECT * from zona WHERE zonaID='$idz'");

			$query->execute();
			$query2->execute();
			$lider = $query->fetch(PDO::FETCH_OBJ);
			$zona=$query2->fetch(PDO::FETCH_OBJ);

			$nombres[0]=$lider->nombre;
			$nombres[1]=$zona->nombre;
			return $nombres;
			//return $query2->fetch(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
    }
	public function GuardarGrupoM($nombre, $idz){
        try {
        //$id=$_SESSION['usuarioID'];
       /* $query = $this->pdo->prepare("SELECT zo.zonaID from zona zo, usuarioo us where us.usuarioID='$id' and zo.usuarioID=us.usuarioID");
        $query->execute();*/
        //$zonaID= $query->fetch(PDO::FETCH_OBJ);
        //$idz=$zonaID;
        $idUs=$_SESSION['usuarioID'];
        $queryy = "INSERT INTO grupo (nombre, zonaID, usuarioID) VALUES ('$nombre', '$idz',$idUs)";
        //$query->execute();
        $this->pdo->prepare($queryy)->execute();
         } catch (Exception $e) {
         	die($e->getMessage());
         }
	}

	public function ListarGrupo(){
        try
		{
			//SELECT * from grupo WHERE usuarioID = '6'
			//SELECT gr.grupoID as idg, zo.zonaID as zid, gr.nombre name, zo.nombre as namezona from zona zo, usuarioo us, grupo gr where us.usuarioID='$id' and zo.usuarioID=us.usuarioID and gr.zonaID=zo.zonaID"
			$idz=$_REQUEST['idz'];
			$id=$_SESSION['usuarioID'];
			$stm = $this->pdo->prepare("SELECT g.nombre as nombreGrupo,z.nombre as nombreZona,grupoID, z.zonaID as zonaID from grupo g, zona z WHERE g.usuarioID = '$id' and g.zonaID=z.zonaID");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
    }

    public function listarMiembrosColportores(){
        try
		{
			//SELECT * FROM miembro WHERE miembroID NOT IN (SELECT miembrogrupo.miembroID FROM miembrogrupo)

			$id=$_SESSION['usuarioID'];
			$stm = $this->pdo->prepare("SELECT miembroID ,concat(primerNombre,' ', segundoNombre) as nombres, apellido , ci FROM miembro WHERE miembroID NOT IN (SELECT miembrogrupo.miembroID FROM miembrogrupo)");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
    }

    public function GuardarMiembroGrupo($miembroID = [],$grupoID){
    	try {
    		foreach ($miembroID as $value) {
    			$query= "INSERT INTO miembrogrupo (miembroID, grupoID)
					VALUES (?,?)";
				$this->pdo->prepare($query)->execute(array($value,$grupoID));
    		}    		
    	} catch (Exception $e) {
    		die($e->getMessage());
    	}
    }

	public function listarMiembrosColportoresGrupo(){
		$idg=$_GET['idg'];
        try
		{
			//SELECT * FROM miembro WHERE miembroID NOT IN (SELECT miembrogrupo.miembroID FROM miembrogrupo)

			//$id=$_SESSION['usuarioID'];
			$stm = $this->pdo->prepare("SELECT CONCAT(mi.primerNombre,' ', mi.segundoNombre) as nombre, mi.apellido as apellid, gr.nombre as grupos FROM miembrogrupo mg, miembro mi, grupo gr WHERE mg.grupoID='$idg' AND gr.grupoID=mg.grupoID and mi.miembroID=mg.miembroID");
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