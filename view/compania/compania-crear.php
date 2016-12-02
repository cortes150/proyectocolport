
<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
<h3 class="text-center">Crear Campaña</h3>
<hr>
</div>
	<div class="col-md-2"></div>
</div>
<div class="row">
<div class="col-md-3"></div>
<div class="col-md-6">
<form action="?c=compania&a=Guardar" method="POST">
	<div class="form-group">
		<label for="">Nombre de Campaña:</label>
		<input name="nombreCampania" type="text" class="form-control">
	</div>
	
	<div class="form-group">
		<label for="">Fecha de Inicio:</label>
		<input class="form-control" name="fechaInicio" type="date">		
	</div>
	<div class="form-group">
	<label for="">Fecha Fin:</label>
	<input class="form-control" name="fechaFin" type="date"> 	
	</div>
	<div class="form-group">
	<label for="">Temporada:</label> 
	<select class="form-control" name="temporada" id="">
		<option value="0">---Seleccione Temporada---</option>
		<option value="Invierno">Invierno</option>
		<option value="Verano">Verano</option>
	</select>

	<label for="">Mision:</label> 
	<select class="form-control" name="mision" id="">
		<option value="0">---Seleccione Mision---</option>
		<option value="Mision Boliviana Central">Mision Boliviana Central</option>
		<option value="Mision Boliviana Occidental">Mision Boliviana Occidental</option>
		<option value="Mision Brasil">Mision Brasil</option>
	</select>

	<input type="hidden" name="estado" value="Activo">
	</div>
	<button type="submit" class="btn btn-primary btn-block">Registrar</button>
</form>
</div>
<div class="col-md-3"></div>
</div>
<!--verifiacar las inserciones de cada vez q se hace un refresh-->