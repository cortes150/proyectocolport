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
    	$idcampania=$_REQUEST['id'];
        try
		{ //SELECT * FROM zona WHERE zonaID NOT IN (SELECT miembrozona.zonaID FROM miembrozona)
			$stm = $this->pdo->prepare("SELECT `zonaID`, `nombre` FROM `zona` WHERE zonaID NOT IN (SELECT miembrozona.zonaID FROM miembrozona) and companiaID='$idcampania'");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
    }

    public function listarAsignadosCampania(){///actualizarce automaticamente
        try
		{
			$id=$_REQUEST['id'];

			$stm = $this->pdo->prepare("SELECT nombre FROM zona WHERE companiaID='$id'");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
			/*$stm = $this->pdo->prepare("SELECT colportorID AS id, CONCAT(primer, ' ',segundo, ' ',paterno, ' ',materno) AS Nombre , zonaID as nombre, rol FROM colportor col  WHERE rol='lider' and zonaID is not NULL ORDER BY Nombre ASC");*/
			/*$stm = $this->pdo->prepare("SELECT CONCAT(primer,' ',segundo,' ',paterno,' ',materno) as Nombre, zo.nombre, col.rol from colportor col, zona zo WHERE rol='lider' AND col.zonaID is not null and col.zonaID=zo.zonaID ORDER by Nombre ASC");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);*/
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
    public function PerfilLider(){
        try
		{//SELECT * FROM usuarioo us, zona zo, compania cp, miembro mi WHERE us.usuarioID='3' and cp.companiaID=zo.zonaID and mi.miembroID=us.miembroID

		//SELECT concat(m.primerNombre,' ',m.segundoNombre) as nombres,m.apellido,comp.nombreCampania,z.nombre FROM miembrozona mz,miembro m,zona z,compania comp where mz.miembroID = '16' and mz.miembroID=m.miembroID AND mz.zonaID=z.zonaID and comp.companiaID=z.companiaID
		//$id=$_SESSION['usuarioID'];
		$miembroID=$_SESSION['miembroID'];
		$stm = $this->pdo->prepare("SELECT concat(m.primerNombre,' ',m.segundoNombre) as nombres,z.zonaID as zonaID,m.apellido as apellido,comp.nombreCampania as nombreCampania,z.nombre as nombreZona FROM miembrozona mz,miembro m,zona z,compania comp where mz.miembroID = '$miembroID' and mz.miembroID=m.miembroID AND mz.zonaID=z.zonaID and comp.companiaID=z.companiaID");
			$stm->execute();

			return $stm->fetch(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
    }

    public function listarColportoresLibros(){
    	// aqui la lista de libros asignados a cada colportor
    	//SELECT mi.primerNombre, lb.titulo, SUM( ml.cantidad) as ls FROM miembrolibro ml, libro lb, miembro mi where mi.miembroID=ml.miembroID and ml.libroID = lb.libroID and mi.miembroID = '1' GROUP BY lb.titulo

    	///LISTA DE MIEMBROS ASIGNADOS CON LIBROS SELECT concat(mi.primerNombre,' ', mi.segundoNombre,' ',apellido) as nombre, ml.miembroID as miembroID FROM miembrolibro ml, miembro mi, libro lb where ml.miembroID = mi.miembroID and ml.libroID=lb.libroID GROUP BY ml.miembroID
    	$id=$_SESSION['usuarioID'];
    	//SELECT * FROM miembrolibro ml, miembrogrupo mg, grupo gp,libro lb,miembro mi WHERE ml.miembroID = mg.miembroID and gp.usuarioID='7' AND mi.miembroID=mg.miembroID and ml.miembroID = mi.miembroID GROUP by ml.miembroID

    	//para un solo miembro
    	//SELECT * FROM miembrolibro ml,miembrogrupo mg, grupo gp WHERE mg.miembroID='7' and gp.grupoID=mg.grupoID AND gp.usuarioID='8'
    	//paratodos de un solo grupo
    	//SELECT * FROM miembrolibro ml,miembrogrupo mg, grupo gp WHERE gp.grupoID=mg.grupoID AND gp.usuarioID='7'

    	//LISTA COLP CON DISTINTO GRUPO
    	//SELECT * FROM miembrolibro ml,miembrogrupo mg, grupo gp WHERE ml.miembroID = mg.miembroID GROUP BY ml.miembroID

    	///SELECT * FROM miembrolibro ml,miembrogrupo mg, grupo gp WHERE ml.miembroID = mg.miembroID AND mg.grupoID=gp.grupoID AND gp.usuarioID='7' GROUP BY ml.miembroID


    	try {
    	/*$sql=$this->pdo->prepare("SELECT concat(mi.primerNombre,' ', mi.segundoNombre,' ',mi.apellido) as name, ml.miembroID as miemID FROM miembrolibro ml, miembro mi, libro lb where ml.miembroID = mi.miembroID and ml.libroID=lb.libroID and lb.usuarioID = '$id' GROUP BY ml.miembroID");*/
    	$sql=$this->pdo->prepare("SELECT concat(mi.primerNombre,' ', mi.segundoNombre,' ',mi.apellido) as name, ml.miembroID as miemID FROM miembro mi, miembrolibro ml,miembrogrupo mg, grupo gp WHERE ml.miembroID = mg.miembroID AND mg.grupoID=gp.grupoID AND gp.usuarioID='$id' AND mi.miembroID = mg.miembroID GROUP BY ml.miembroID");
//SELECT concat(mi.primerNombre,' ', mi.segundoNombre,' ',mi.apellido) as name, ml.miembroID as miemID FROM miembro mi, miembrolibro ml,miembrogrupo mg, grupo gp WHERE ml.miembroID = mg.miembroID AND mg.grupoID=gp.grupoID AND gp.usuarioID='8' GROUP BY ml.miembroID

    	$sql->execute();
		return $sql->fetchAll(PDO::FETCH_OBJ);
    	} catch (Exception $e) {
    		
    	}
    }

    public function listarColportoresLibrosID(){
    	// aqui la lista de libros asignados a cada colportor
    	//SELECT mi.primerNombre, lb.titulo, SUM( ml.cantidad) as ls FROM miembrolibro ml, libro lb, miembro mi where mi.miembroID=ml.miembroID and ml.libroID = lb.libroID and mi.miembroID = '1' GROUP BY lb.titulo

    	///LISTA DE MIEMBROS ASIGNADOS CON LIBROS SELECT concat(mi.primerNombre,' ', mi.segundoNombre,' ',apellido) as nombre, ml.miembroID as miembroID FROM miembrolibro ml, miembro mi, libro lb where ml.miembroID = mi.miembroID and ml.libroID=lb.libroID GROUP BY ml.miembroID

    	//SELECT * FROM miembrolibro ml,miembrogrupo mg, grupo gp WHERE ml.miembroID = mg.miembroID AND mg.grupoID=gp.grupoID AND gp.usuarioID='8' GROUP BY ml.miembroID
    	$id=$_GET['id'];
    	try {
    	$sql=$this->pdo->prepare("SELECT lb.titulo as titulo, SUM( ml.cantidad) as ls,ml.libroID as libroID FROM miembrolibro ml, libro lb, miembro mi where mi.miembroID=ml.miembroID and ml.libroID = lb.libroID and mi.miembroID = '$id' GROUP BY lb.titulo");
    	$sql->execute();
		return $sql->fetchAll(PDO::FETCH_OBJ);
    	} catch (Exception $e) {
    		
    	}
    }

    public function NombreMiembro(){
    	$id=$_GET['id'];
    	try {
    	$query=$this->pdo->prepare("SELECT primerNombre, segundoNombre, apellido FROM miembro WHERE miembroID='$id'");
    	$query->execute();
		return $query->fetch(PDO::FETCH_OBJ);
    	} catch (Exception $e) {
    		
    	}
    }
public function Deuda(){
    	$id=$_GET['id'];
    	try {
    	$query=$this->pdo->prepare("SELECT SUM(cantidad*precioLibro) as precio FROM miembrolibro ml where ml.miembroID = '$id'");
    	$query->execute();
		return $query->fetch(PDO::FETCH_OBJ);
    	} catch (Exception $e) {
    		
    	}
    }

public function TotalLibrosAsignados(){
    	$id=$_GET['id'];
    	try {
    	$query=$this->pdo->prepare("SELECT SUM(cantidad) as tla FROM miembrolibro WHERE miembroID='$id'");
    	$query->execute();
		return $query->fetch(PDO::FETCH_OBJ);
    	} catch (Exception $e) {
    		
    	}
    }

    public function Disponible($libroID){
    	$id=$_GET['id'];
    	try {
    	$query=$this->pdo->prepare("SELECT SUM( ml.cantidad-vl.cantidad) as disponible FROM miembrolibro ml, libro lb, miembro mi, ventalibro vl, venta v where mi.miembroID=ml.miembroID and ml.libroID = lb.libroID and mi.miembroID = '$id' and v.ventaID=vl.ventaID AND lb.libroID='$libroID' and vl.libroID=ml.libroID GROUP BY lb.titulo");
    	$query->execute();
		return $query->fetch(PDO::FETCH_OBJ);
    	} catch (Exception $e) {
    		
    	}
    }

    public function LibroContado($libroID){
    	$id=$_GET['id'];
    	try {
    	//$query=$this->pdo->prepare("SELECT SUM(vl.cantidad) cant FROM pago p, venta v, ventalibro vl, usuarioo us WHERE v.ventaID=p.ventaID and p.TipoDePago='contado' and vl.libroID='$libroID' and us.miembroID='$id'");
    	$query=$this->pdo->prepare("SELECT SUM(vl.cantidad) cant FROM libro li, venta v,pago p, ventalibro vl, usuarioo us WHERE v.ventaID= p.ventaID and vl.ventaID=v.ventaID and us.miembroID='$id' and li.libroID=vl.libroID and li.libroID='$libroID' and p.TipoDePago='contado' GROUP BY p.TipoDePago, vl.libroID");
    	$query->execute();
		return $query->fetch(PDO::FETCH_OBJ);
    	} catch (Exception $e) {
    		
    	}
    }
    

    public function LibroCredito($libroID){
    	$id=$_GET['id'];
    	try {
    	//$query=$this->pdo->prepare("SELECT SUM(vl.cantidad) Cant FROM pago p, venta v, ventalibro vl, usuarioo us WHERE v.ventaID=p.ventaID and p.TipoDePago='credito' and vl.libroID='$libroID' and us.miembroID='$id'");
    	//$query=$this->pdo->prepare("SELECT SUM(vl.cantidad) as credito FROM venta v,pago p, ventalibro vl, usuarioo us WHERE v.ventaID= p.ventaID and p.TipoDePago='credito' and vl.ventaID=v.ventaID and us.miembroID='$id' GROUP BY vl.libroID");
    		$query=$this->pdo->prepare("SELECT SUM(vl.cantidad) credito FROM libro li, venta v,pago p, ventalibro vl, usuarioo us WHERE v.ventaID= p.ventaID and vl.ventaID=v.ventaID and us.miembroID='$id' and li.libroID=vl.libroID and li.libroID='$libroID' and p.TipoDePago='credito' GROUP BY p.TipoDePago, vl.libroID");
    		
    	$query->execute();
		return $query->fetch(PDO::FETCH_OBJ);
    	} catch (Exception $e) {
    		
    	}
    }
    //SELECT * FROM venta v,pago p, ventalibro vl, usuarioo us WHERE v.ventaID= p.ventaID and p.TipoDePago='contado' and vl.ventaID=v.ventaID and us.miembroID='2'

public function LibrosAsignadosZonasCampaniaa(){///actualizarce automaticamente
        try
        {
            $id=$_REQUEST['id'];

            $stm = $this->pdo->prepare("SELECT titulo, resumen, imagen FROM libro WHERE companiaID='$id'");
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

