<?php 
class Libro
{
	private $pdo;
	public $libroID;
	public $titulo;
	public $resumen;
	public $imagen;
	public $oficial;
	public $venta;
	public $archivo;
	public $destino;

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

    public function GuardarLibro(Libro $datos)
	{
	try
		{
			
            $sql = "INSERT INTO libro (titulo,resumen,imagen,oficial,venta)
		        VALUES ( ?, ?, ?, ?, ?)";

            $this->pdo->prepare($sql)->execute(array(
            	$datos->titulo,
            	$datos->resumen,
            	$datos->imagen,
            	$datos->oficial,
            	$datos->venta));
		}
        catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function listarLibro(){
        try
		{
			$stm = $this->pdo->prepare("SELECT * FROM libro ORDER BY titulo ASC");
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