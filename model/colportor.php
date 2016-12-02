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

    public function PerfilColpoltor(){
    	$idUsuario=$_SESSION['usuarioID'];
        try
		{
			$stm = $this->pdo->prepare("SELECT miembroID FROM usuarioo US WHERE usuarioID='$idUsuario'");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
    }

    /*detalle colportor*/
    public function NombreMiembro(){
    	$id=$_SESSION['miembroID'];
    	try {
    	$query=$this->pdo->prepare("SELECT primerNombre, segundoNombre, apellido FROM miembro WHERE miembroID='$id'");
    	$query->execute();
		return $query->fetch(PDO::FETCH_OBJ);
    	} catch (Exception $e) {
    		
    	}
    }
public function Deuda(){
    	$id=$_SESSION['miembroID'];
    	try {
    	$query=$this->pdo->prepare("SELECT SUM(ml.precioLibro) precio FROM miembrolibro ml where ml.miembroID = '$id'");
    	$query->execute();
		return $query->fetch(PDO::FETCH_OBJ);
    	} catch (Exception $e) {
    		
    	}
    }

public function TotalLibrosAsignados(){
    	$id=$_SESSION['miembroID'];
    	try {
    	$query=$this->pdo->prepare("SELECT SUM(cantidad) as tla FROM miembrolibro WHERE miembroID='$id'");
    	$query->execute();
		return $query->fetch(PDO::FETCH_OBJ);
    	} catch (Exception $e) {
    		
    	}
    }

    public function Disponible($libroID){
    	$id=$_SESSION['miembroID'];
    	try {
    	$query=$this->pdo->prepare("SELECT SUM( ml.cantidad-vl.cantidad) as disponible FROM miembrolibro ml, libro lb, miembro mi, ventalibro vl, venta v where mi.miembroID=ml.miembroID and ml.libroID = lb.libroID and mi.miembroID = '$id' and v.ventaID=vl.ventaID AND lb.libroID='$libroID' and vl.libroID=ml.libroID GROUP BY lb.titulo");
    	$query->execute();
		return $query->fetch(PDO::FETCH_OBJ);
    	} catch (Exception $e) {
    		
    	}
    }

    public function LibroContado($libroID){
    	$id=$_SESSION['miembroID'];
    	try {
    	//$query=$this->pdo->prepare("SELECT SUM(vl.cantidad) cant FROM pago p, venta v, ventalibro vl, usuarioo us WHERE v.ventaID=p.ventaID and p.TipoDePago='contado' and vl.libroID='$libroID' and us.miembroID='$id'");
    	$query=$this->pdo->prepare("SELECT SUM(vl.cantidad) cant FROM libro li, venta v,pago p, ventalibro vl, usuarioo us WHERE v.ventaID= p.ventaID and vl.ventaID=v.ventaID and us.miembroID='$id' and li.libroID=vl.libroID and li.libroID='$libroID' and p.TipoDePago='contado' GROUP BY p.TipoDePago, vl.libroID");
    	$query->execute();
		return $query->fetch(PDO::FETCH_OBJ);
    	} catch (Exception $e) {
    		
    	}
    }
    

    public function LibroCredito($libroID){
    	$id=$_SESSION['miembroID'];
    	try {
    	//$query=$this->pdo->prepare("SELECT SUM(vl.cantidad) Cant FROM pago p, venta v, ventalibro vl, usuarioo us WHERE v.ventaID=p.ventaID and p.TipoDePago='credito' and vl.libroID='$libroID' and us.miembroID='$id'");
    	//$query=$this->pdo->prepare("SELECT SUM(vl.cantidad) as credito FROM venta v,pago p, ventalibro vl, usuarioo us WHERE v.ventaID= p.ventaID and p.TipoDePago='credito' and vl.ventaID=v.ventaID and us.miembroID='$id' GROUP BY vl.libroID");
    		$query=$this->pdo->prepare("SELECT SUM(vl.cantidad) credito FROM libro li, venta v,pago p, ventalibro vl, usuarioo us WHERE v.ventaID= p.ventaID and vl.ventaID=v.ventaID and us.miembroID='$id' and li.libroID=vl.libroID and li.libroID='$libroID' and p.TipoDePago='credito' GROUP BY p.TipoDePago, vl.libroID");
    		
    	$query->execute();
		return $query->fetch(PDO::FETCH_OBJ);
    	} catch (Exception $e) {
    		
    	}
    }
    public function listarColportoresLibrosID(){
    	// aqui la lista de libros asignados a cada colportor
    	//SELECT mi.primerNombre, lb.titulo, SUM( ml.cantidad) as ls FROM miembrolibro ml, libro lb, miembro mi where mi.miembroID=ml.miembroID and ml.libroID = lb.libroID and mi.miembroID = '1' GROUP BY lb.titulo

    	///LISTA DE MIEMBROS ASIGNADOS CON LIBROS SELECT concat(mi.primerNombre,' ', mi.segundoNombre,' ',apellido) as nombre, ml.miembroID as miembroID FROM miembrolibro ml, miembro mi, libro lb where ml.miembroID = mi.miembroID and ml.libroID=lb.libroID GROUP BY ml.miembroID

    	//SELECT * FROM miembrolibro ml,miembrogrupo mg, grupo gp WHERE ml.miembroID = mg.miembroID AND mg.grupoID=gp.grupoID AND gp.usuarioID='8' GROUP BY ml.miembroID
    	$id=$_SESSION['miembroID'];
    	try {
    	$sql=$this->pdo->prepare("SELECT lb.titulo as titulo, SUM( ml.cantidad) as ls,ml.libroID as libroID FROM miembrolibro ml, libro lb, miembro mi where mi.miembroID=ml.miembroID and ml.libroID = lb.libroID and mi.miembroID = '$id' GROUP BY lb.titulo");
    	$sql->execute();
		return $sql->fetchAll(PDO::FETCH_OBJ);
    	} catch (Exception $e) {
    		
    	}
    }

    public function listarCampaniaLibro(){
    	$id=$_SESSION['usuarioID'];
       	$sql=$this->pdo->prepare("SELECT z.companiaID FROM miembrogrupo mg, usuarioo u, grupo g, zona z WHERE mg.miembroID = u.miembroID and g.grupoID=mg.grupoID and z.zonaID=g.zonaID and u.usuarioID = '$id'");
    	$sql->execute();

		$companiaID =$sql->fetch(PDO::FETCH_OBJ);
		$sq=$this->pdo->prepare("SELECT * from libro where companiaID='$companiaID->companiaID' ORDER BY titulo");
    	$sq->execute();
		return $sq->fetchAll(PDO::FETCH_OBJ);
    }
}

 ?>