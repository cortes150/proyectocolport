<?php 
class Libro
{
	private $pdo;
	public $libroID;
	public $titulo;
	public $resumen;
	public $imagen;
	public $precioOficial;
	public $precioVenta;
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
			
            $sql = "INSERT INTO libro (titulo,resumen,imagen,precioOficial,precioVenta,companiaID,cantidad)
		        VALUES ( ?, ?, ?, ?, ?,?,?)";

            $this->pdo->prepare($sql)->execute(array(
            	$datos->titulo,
            	$datos->resumen,
            	$datos->imagen,
            	$datos->precioOficial,
            	$datos->precioVenta));
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