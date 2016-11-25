
<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
<h3 class="text-center">CREAR CAMPAÑA</h3>
<hr>
</div>
	<div class="col-md-2"></div>
</div>
<div class="row">
<div class="col-md-2"></div>
<div class="col-md-8">
<form action="?c=compania&a=Guardar" method="POST">
	<div class="form-group">
		<label for="">Nombre de Campaña:</label>
		<input name="nombreCompania" type="text" class="form-control">
	</div>
	<div class="form-group">
		<label for="">Coodinador:</label> 
		<select class="form-control" name="coordinadorID" id=""> NOMBRE COMPLETO
			<option value="0">---Seleccione Coordinador---</option>
			<?php foreach($this->model->listarCoodinador() as $r): ?>
	 		<option value="<?php echo $r->coordinadorID; ?>"><?php echo $r->primer; ?></option>
			<?php endforeach; ?>
	 	</select> 
	</div>
	<div class="form-group">
		<label for="">Fecha de Inicio:</label>
		<input class="form-control" name="inicio" type="date">		
	</div>
	<div class="form-group">
	<label for="">Fecha Fin:</label>
	<input class="form-control" name="fin" type="date"> 	
	</div>
	<div class="form-group">
	<label for="">Temporada:</label> 
	<select class="form-control" name="temporada" id="">
		<option value="0">---Seleccione Temporada---</option>
		<option value="Invierno">Invierno</option>
		<option value="Verano">Verano</option>
	</select>

	<input type="hidden" name="estado" value="Activo">
	</div>
	<button type="submit" class="form-control">Registrar</button>
</form>
</div>
<div class="col-md-2"></div>
</div>
<!--verifiacar las inserciones de cada vez q se hace un refresh-->