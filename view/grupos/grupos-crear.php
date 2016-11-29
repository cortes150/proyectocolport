<h3 class="text-center">Lista de Grupos</h3>
<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
		<form action="?c=Grupo&a=GuardarGrupoC" method="POST">
			<div class="form-group">
				<label>Nombre del Grupo</label>
				<input type="text" class="form-control" name="nombre">
				<input type="text" name="zonaID" value="<?php echo $_GET['idz']; ?>">

			</div>
			<input type="submit" class="form-control" value="Crear">
		</form>
	</div>
	<div class="col-md-2"></div>
</div>