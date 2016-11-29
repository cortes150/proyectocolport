<h3>Asisgnar Zona al lider</h3>
<div class="row">
	<div class="form-group">
	<label for="">seleccione lider</label>
	<form action="?c=Zona&a=guardarAsignado" method="post">
	<select name="miembroID" class="form-control">
	<?php foreach($this->model->listarColportorLider() as $r): ?>
		<option value="<?php echo $r->id; ?>"><?php echo $r->Nombre; ?></option>		
		<?php endforeach; ?>
	</select>
	</div>
	<div class="form-group">
	<label for="">asignar zona</label>
	<select name="zonaID" class="form-control">
	<?php foreach($this->model->listarZonas() as $r): ?>
			<option value="<?php echo $r->zonaID; ?>"><?php echo $r->nombre; ?></option>		
			<?php endforeach; ?>
	</select>
	</div>
	<input class="btn btn-primary" type="submit" value="Crear">
</div>
</form>
