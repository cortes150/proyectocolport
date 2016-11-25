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
            $sql = "INSERT INTO usuario (nick, clave)
		        VALUES ( ?, ?)";

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
		$contador = 0;
		try {
		$sql= $this->pdo->prepare("select * from usuario where nick='$datos->nick'");
		$sql->execute();

		$resultado=$sql->fetch(PDO::FETCH_OBJ);
		if ($resultado) {
			if(password_verify($datos->clave, $resultado->clave))
			{
				//session_start();
				$_SESSION['usuario']=$resultado->nick;
				echo "<script>window.location.assign('http://localhost:8080/colportaje/?c=inicio&a=Bienvenido')</script>";
			}else{
				echo "<script>alert('El usuario o contraseña esta incorrecto');</script>";
				echo "<script>window.location.assign('http://localhost:8080/colportaje/?c=inicio&a=Index')</script>";
			}
		}
		else{
			echo "<script>alert('El usuario o contraseña esta incorrecto');</script>";
			echo "<script>window.location.assign('http://localhost:8080/colportaje/?c=inicio&a=Index')</script>";
		}
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

}

 ?>