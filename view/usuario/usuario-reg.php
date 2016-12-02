<h3 class="text-center">Registrar Usuario</h3>

<div class="row">
	<div class="col-md-4"></div>
	<div class="col-md-4">
<hr>		<div class="form-group">
<form action="?c=Usuario&a=Guardar" method="POST">
	<label for="">Username</label>
	<input class="form-control" name="nick" type="text">
</div>
<div class="form-group">
	<label for="">Contraseña</label>
	<input class="form-control" type="password" name="clave">	
</div>
<div class="form-group">
	<label for="">Tipo</label>
	<div class="row">
		<div class="col-md-6">
		<div class="radio radio-inline">
  			<label class="form-control"><input type="radio" name="tipo" value="lider">Lider</label>
		</div>
		</div>
		<div class="col-md-6">
		<div class="radio radio-inline">
  			<label class="form-control"><input  type="radio" name="tipo" value="colportor" checked>Colportor</label>
		</div>
		</div>
	</div>
</div>
<div class="form-group">
  <label for="sel1">Seleccione Colportor</label>

  <select class="form-control" name="miembroID">
  <option value="0">Selecciones Colportor</option>
  	<?php foreach($this->model->ColportorMiembro() as $r): ?>
			<option value="<?php echo $r->miembroID; ?>"><?php echo $r->nombre; ?></option>		
	<?php endforeach; ?>
  </select>
</div>
<div class="form-group">
	<input class="btn btn-primary btn-block" type="submit" value="Registrar">
</form>
</div>
	</div>
<hr>
	<div class="col-md-4"></div>
</div>

<!--verifiacar las inserciones de cada vez q se hace un refresh-->


<!-- saved from url=(0050)http://getbootstrap.com/examples/navbar-fixed-top/ -->

  
        