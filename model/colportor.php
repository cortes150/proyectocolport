 <?php 
class Colportor
{
	//private $model;
    public $nombre;
    public $apellido;
    public $ci;
    public $nacimiento;
    public $pais;
    public $ciudad;
    public $universidad;
    public $facultad;

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

 	$stm = $this->pdo->prepare("SELECT * FROM `colportorr` WHERE `ci`=$datos->ci");///ordenar alf
			$bind = $stm->bindValue(':ci', $datos->ci, PDO::PARAM_INT);
			$stm->execute();

			//$stm = $pdo->prepare('select * from author where id = :id');
			//$bind = $stm->bindValue(':id', $id, PDO::PARAM_INT);
// Create the query and asign the result to a variable call $result
	
	// Extract the values from $result
	$rows = $stm->fetchAll();

	return $rows;
	// Since the values are an associative array we use foreach to extract the values from $rows
	foreach ($rows as $row) {
		echo 'id_empleado: '.$row['colportorID'].'<br/>';
		echo 'nombre: '.$row['nombre'].'<br/>';
		echo 'email: '.$row['apellido'].'<br/>';
		echo 'telefono: '.$row['ci'].'<br/>';
		echo "<hr/>";
	}

//$stm->execute();
// $authors = $stm->fetchAll(PDO::FETCH_ASSOC);
// $numero = count($authors[0]);
// for ($i=0; $i <$numero ; $i++) { 
// 	# code...
// 	echo $authors[0] . "<br />\n";
// }

//sql = "SELECT * FROM `colportorr` WHERE `ci`=$datos->ci";



    }
    public function guardarColpotor(Colportor $datos){


// $sql = "INSERT INTO `colportorr` (`colportorID`, `nombre`, `apellido`, `ci`, `nacimiento`, `pais`, `ciudad`, `universidad`, `facultad`) VALUES (NULL, \'carlos\', \'peralta\', \'2343221\', \'1986-04-23\', \'ecuado\', \'quito\', \'Uab\', \'teologia\')";
//strtotime("$datos->nacimiento")
// try {

// $stm = $this->pdo->prepare("INSERT INTO `colportorr` (`colportorID`, `nombre`, `apellido`, `ci`, `nacimiento`, `pais`, `ciudad`, `universidad`, `facultad`) VALUES (NULL, \'$datos->nombre\', \'$datos->apellido\', \'$datos->ci\', \'$datos->nacimiento)\', \'$datos->pais\', \'$datos->ciudad\', \'$datos->universidad\', \'$datos->facultad\')");///ordenar alf
			
// 			$stm->execute();	
// } catch (Exception $e) {

// 	die($e->getMessage());
// }
  //   	$sql = "INSERT INTO `colportorr` (`colportorID`, `nombre`, `apellido`, `ci`, `nacimiento`, `pais`, `ciudad`, `universidad`, `facultad`) VALUES (NULL, \'$datos->nombre\', \'$datos->apellido\', \'$datos->ci\', \'strtotime("$datos->nacimiento")\', \'$datos->pais\', \'$datos->ciudad\', \'$datos->universidad\', \'$datos->facultad\')";
    	
$sql = "INSERT INTO colportorr (nombre,apellido,ci,nacimiento,pais,ciudad,universidad,facultad)
		        VALUES ( ?, ?, ?, ?, ?,?,?,?)";

    	try
		{
			
          $date = new DateTime($datos->nacimiento);
//echo $date->format('Y-m-d');
            $this->pdo->prepare($sql)->execute(array(
            	$datos->nombre,
            	$datos->apellido,
            	$datos->ci,
            	$date->format('Y-m-d'),
            	$datos->pais,
            	$datos->ciudad,
            	$datos->universidad,
            	$datos->facultad));
		}
        catch (Exception $e)
		{
			die($e->getMessage());
		}

    }

    public function listarColpoltor(){
        try
		{
			$stm = $this->pdo->prepare("SELECT * FROM colportorr ORDER BY nombre ASC");
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