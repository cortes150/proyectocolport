
<h3 class="text-center">Registrar Ventas</h3>
<form action="?c=Ventas&a=Vender" method="post">
<div class="form-group">
<div class="row">
	
	<div class="col-md-6">
		<label>Libro</label>
	<select class="form-control" name="LibroID">
  <option value="0">Seleccione Libros</option>
  	<?php foreach($this->model->litarLibros() as $r): ?>

			<option value="<?php echo $r->libroID; ?>"><?php echo $r->titulo; ?>
			</option>	

	<?php endforeach; ?>
  </select>
	</div>
	<div class="col-md-6">
		<label>Precio</label>
		<input type="text" class="form-control">
	</div>
</div>
	
</div>
<div class="form-group">
	<label>Cantidad</label>
	<input type="text" class="form-control" name="CantidadVenta">
</div>
<div class="form-group">
<label>Modalidad de Pago</label>
<div class="radio">
	 <br>
	<label for=""><input type="radio" name="TipoDepago" value="contado">Contado</label>
	<label for=""><input type="radio" name="TipoDepago" value="credito">Cuota</label>
</div></div>

<label>Monto</label>
	<input type="text" class="form-control" name="Monto">
<div class="form-group">
	<label for="">Cliente</label>
	<select class="form-control" name="clienteID">
  <option value="0">Seleccione Cliente</option>
  	<?php foreach($this->model->listarClietes() as $r): ?>
			<option value="<?php echo $r->clienteID; ?>"><?php echo $r->nombres; ?></option>		
	<?php endforeach; ?>
  </select>
</div>
<div class="row">
	<div class="col-md-12">
		<input type="submit" class="btn btn-primary btn-block" value="Registrar Compra">
	</div>
</div>
</form>