<?php 
class Usuario
{
	private $pdo;
	public $usuarioID;
	public $nick;
	public $clave;

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

	public function listarUsuario(){
        try
		{
			$stm = $this->pdo->prepare("SELECT * FROM usuario");///ordenar alf
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
    }

    public function GuardarUsuario(Usuario $datos)
	{
		try
		{
				$sql = "INSERT INTO usuarioo (nick,clave,tipo,miembroID)
		        VALUES (?,?,null,null)";

            $this->pdo->prepare($sql)->execute(array(
            	$datos->nick,
            	$datos->pass_cifrado));
		}
        catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function SesionIniciada(Usuario $datos)
	{
		//$usuario=$_POST['nick'];

		session_start();
    	ob_start();
		$contador = 0;
		try {
			//$_SESSION['sesion_exito']=3;
		$sql= $this->pdo->prepare("select * from usuarioo where nick='$datos->nick'");
		$sql->execute();

		$resultado=$sql->fetch(PDO::FETCH_OBJ);

		if ($resultado) {

			if(password_verify($datos->clave, $resultado->clave))
			{
			
				if ($resultado->tipo=="lider") {

				$_SESSION['nick']=$resultado->nick;
				$_SESSION['usuarioID']=$resultado->usuarioID;
				$_SESSION['Tipo']=$resultado->tipo;
				echo "<script>window.location.assign('http://localhost:8080/COLPORTAJE/?c=compania&a=index')</script>";
				//echo "<script>window.location.assign('http://localhost/Colport/?c=compania&a=index')</script>";
				//es lider
			}

			if ($resultado->tipo=="coordinador") {
				//es coordinador array("naranja", "plátano");

				$_SESSION['nick']=$resultado->nick;
				$_SESSION['usuarioID']=$resultado->usuarioID;
				$_SESSION['Tipo']=$resultado->tipo;
				echo "<script>window.location.assign('http://localhost:8080/COLPORTAJE/?c=compania&a=index')</script>";
				//echo "<script>window.location.assign('http://localhost/Colport/?c=compania&a=index')</script>";
				
			}

			if ($resultado->tipo=="colportor") {
				//es colpor
				$_SESSION['nick']=$resultado->nick;
				$_SESSION['usuarioID']=$resultado->usuarioID;
				$_SESSION['Tipo']=$resultado->tipo;
				echo "<script>window.location.assign('http://localhost:8080/COLPORTAJE/?c=compania&a=index')</script>";
				//echo "<script>window.location.assign('http://localhost/Colport/?c=compania&a=index')</script>";
			}
				//session_start();
				
				
			}else{
				echo "<script>alert('El usuario o contraseña esta incorrecto');</script>";
				echo "<script>window.location.assign('http://localhost:8080/COLPORTAJE/?c=inicio&a=Login')</script>";
				//echo "<script>window.location.assign('http://localhost/Colport/?c=inicio&a=Login')</script>";
			}
		}
		else{
			echo "<script>alert('El usuario o contraseña esta incorrecto');</script>";
			echo "<script>window.location.assign('http://localhost:8080/COLPORTAJE/?c=inicio&a=Login')</script>";
			//echo "<script>window.location.assign('http://localhost/Colport/?c=inicio&a=Login')</script>";
		}
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

}

 ?>