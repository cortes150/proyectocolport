<?php 

class Grupo
{

	private $pdo;

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
	public function GuardarGrupo($nombre){
        try {
        $id=$_SESSION['usuarioID'];
        $query = $this->pdo->prepare("SELECT zo.zonaID from zona zo, usuarioo us where us.usuarioID='$id' and zo.usuarioID=us.usuarioID");
        $query->execute();
        $zonaID= $query->fetch(PDO::FETCH_OBJ);
        $name=$nombre;
        $queryy = "INSERT INTO grupo (nombre, zonaID) VALUES ('$nombre', '$zonaID->zonaID')";
        //$query->execute();
        $this->pdo->prepare($queryy)->execute();
         } catch (Exception $e) {
         	die($e->getMessage());
         }

	}

	public function ListarGrupo(){
        try
		{
			$id=$_SESSION['usuarioID'];
			$stm = $this->pdo->prepare("SELECT zo.zonaID as zid, gr.nombre name, zo.nombre as namezona from zona zo, usuarioo us, grupo gr where us.usuarioID='$id' and zo.usuarioID=us.usuarioID and gr.zonaID=zo.zonaID");
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