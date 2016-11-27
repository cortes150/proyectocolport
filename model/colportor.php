 <?php 
class Colportor
{
	private $model;
    public $primerNombre;
    public $segundoNombre;
    public $apellido;
    public $ci;
    public $nacimiento;
    public $pais;
    public $ciudad;
    public $universidad;
    public $facultad;
    public $carrera;

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

 public function verificarExistente(Colportor $datos){
		try
		{
			$consulta="SELECT * from miembro WHERE ci='$datos->ci'";
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
    public function guardarColpotor(Colportor $datos){

    	$sql = "INSERT INTO miembro (primerNombre,segundoNombre,apellido,ci,nacimiento,pais,ciudad,universidad,facultad,carrera)
		        VALUES ( ?, ?, ?, ?, ?,?,?,?,?,?)";

    	try
		{

          $date = new DateTime($datos->nacimiento);
//echo $date->format('Y-m-d');
            $this->pdo->prepare($sql)->execute(array(
            	$datos->primerNombre,
            	$datos->segundoNombre,
            	$datos->apellido,
            	$datos->ci,
            	$date->format('Y-m-d'),
            	$datos->pais,
            	$datos->ciudad,
            	$datos->universidad,
            	$datos->facultad,
            	$datos->carrera));
		}
        catch (Exception $e)
		{
			die($e->getMessage());
		}

    }

    public function listarColpoltor(){
        try
		{
			$stm = $this->pdo->prepare("SELECT * FROM miembro ORDER BY primerNombre ASC");
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