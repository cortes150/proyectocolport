<h3 class="text-cente">Crear Zonas</h3>
<div class="row">
<form action="?c=Zona&a=GuardarZona" method="POST">
	<div class="form-group">
		<label>Nombre de la Zona</label>
		<input type="text" class="form-control" name="nombre">
		<input type="hidden" name="companiaID" value="<?php echo $_GET['id'] ?>">
	</div>
	<input type="submit" value="Crear Zona">
	<button type="submit" class="btn btn-primary">Crear Zona</button>
</form>
</div>