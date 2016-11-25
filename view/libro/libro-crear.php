<form name="registrarImagen" action="?c=libro&a=Guardar" method="POST" enctype="multipart/form-data">
	<label for="">Titulo:</label>
	<br> <input name="titulo" type="text"> <br>
	<label for="">Resumen:</label> <br>
	<input name="resumen" type="text"> <br>
	<label for="">Imagen de la Tapa del Libro:</label>
	<br> <input name="imagen" type="file"> <br>
	<label for="">Precio Oficial:</label>
	<br> <input name="oficial" type="text"> <br>
	<label for="">Precio Venta:</label> <br>
	<input type="text" name="venta">
	<input name="btnGuardar" type="submit" value="Registrar">
</form>
<?php 

?>