<h3 class="text-center">Crear Zonas</h3>
<div class="row">
<div class="col-md-4"></div>
<div class="col-md-4">
<form action="?c=Zona&a=GuardarZona" method="POST">
	<div class="form-group">
		<label>Nombre de la Zona</label>
		<input type="text" class="form-control" name="nombre">
		<input type="hidden" name="companiaID" value="<?php echo $_GET['id'] ?>">
	</div>
	<div class="form-group">
	<input type="submit" class="btn btn-primary btn-block" value="Crear Zona">
	</div>
</form>
</div>
<div class="col-md-4"></div>
</div>