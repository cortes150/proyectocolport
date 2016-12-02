<h3 class="text-center">Asisgnar Zona al lider</h3>
<div class="row">
<div class="col-md-3"></div>
<div class="col-md-6">
	<div class="form-group">
	<label for="">Seleccione Lider</label>
	<form action="?c=Zona&a=guardarAsignado" method="post">
	<select name="miembroID" class="form-control">
	<?php foreach($this->model->listarColportorLider() as $r): ?>
		<option value="<?php echo $r->id; ?>"><?php echo $r->Nombre; ?></option>		
		<?php endforeach; ?>
	</select>
	</div>
	<div class="form-group">
	<label for="">Asigne Zona</label>
	<select name="zonaID" class="form-control">
	<?php foreach($this->model->listarZonas() as $r): ?>
			<option value="<?php echo $r->zonaID; ?>"><?php echo $r->nombre; ?></option>		
			<?php endforeach; ?>
	</select>
	</div>
	<input class="btn btn-primary btn-block" type="submit" value="Crear">
</div>
<div class="col-md-3"></div>
</div>
</form>
