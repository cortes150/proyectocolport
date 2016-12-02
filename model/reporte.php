<?php 
class Reporte
{
	private $pdo;
	//public $id
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

    public function ReporteGrupoZona(){
        try
		{
			$query = $this->pdo->prepare("SELECT g.nombre nombre, SUM(ml.cantidad) as cantidad FROM zona z, grupo g, miembrogrupo mg,miembrolibro ml WHERE g.zonaID=z.zonaID and mg.grupoID=g.grupoID and ml.miembroID=mg.miembroID GROUP BY g.nombre");

			$query->execute();
			$lider = $query->fetchAll(PDO::FETCH_OBJ);
			
			return $lider;
			//return $query2->fetch(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
    }
}

 ?>