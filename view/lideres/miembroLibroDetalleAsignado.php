<h3 class="text-center">Detalle de Libros Asigado</h3>
<hr>
<div class="row">
			<?php $stm=$this->model->NombreMiembro(); ?>
			<div class="form-group">
			<div class="col-md-3"><label for="">
				Nombre Colportor</label></div>
			<div class="col-md-3"><label class="form-control">
				<?php echo $stm->primerNombre; ?></label></div>
			<div class="col-md-3"><label class="form-control">
				<?php echo $stm->segundoNombre; ?></label></div>
			<div class="col-md-3">
				<label class="form-control"><?php echo $stm->apellido; ?></label>
			</div>
			</div>
</div>
<div class="row">
	<div class="col-md-2">
	<?php $deuda=$this->model->Deuda(); ?>
	<label>Deuda:</label></div>
	<div class="col-md-2">
		<label  class="form-control"><?php echo $deuda->precio; ?></label>
	</div>
	<div class="col-md-2">
	<label>Libro Vendido</label></div>
	<div class="col-md-2">
		<label  class="form-control"></label>
	</div>

	<div class="col-md-2">
	<label>Libro Credito</label></div>
	<div class="col-md-2">
		<label  class="form-control"></label>
	</div>
</div>
<div class="row">
	<div class="col-md-4">
	<label>Total Libros Asignados</label></div>
	<div class="col-md-2">
		<label  class="form-control"></label>
	</div>
	<div class="col-md-4">
	<label>Total Libros Disponibles</label></div>
	<div class="col-md-2">
		<label  class="form-control"></label>
	</div>
</div>
<div class="row">
	<table class="table">
		<thead>
			<tr>
				<th>Libro de Campaña</th>
				<th>Libro Asignado</th>
				<th>Disponible</th>
				<th>Libro Vendido</th>
				<th>Libro Credito</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($this->model->listarColportoresLibrosID() as $r): ?>
			<tr>
				<td><?php echo $r->titulo; ?></td>
				<td><?php echo $r->ls; ?></td>
				<td>-</td>
				<td>-</td>
				<td>-</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>