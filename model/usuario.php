<?php 
class Usuario
{
	private $pdo;
	public $usuarioID;
	public $nick;
	public $clave;
	public $clavex;

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
		$contador = 0;
		try {
			if(password_verify($password,$registro['clave'])){
				$contador++;
			}
			if ($contador) {
				
			}
			
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

}

 ?>