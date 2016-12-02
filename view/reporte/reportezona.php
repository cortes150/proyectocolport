<div class="container">
<h3 class="text-center">Reporte Grupo</h3>
<div style="background-color: #f4f4f4; border-radius: 2px;">
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<h4 class="text-center"></h4>
		</div>
		<div class="col-md-3"></div>
	</div>
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-3">
		<label for="">Lider:</label></div>
		<div class="col-md-7"></div>
		<div class="col-md-1"></div>

	</div>
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-2">
			<label>Fecha Inicio</label>
		</div>
		<div class="col-md-3">
			<input type="date">
		</div>
			
		<div class="col-md-2"><label>Fecha Fin</label></div>
		<div class="col-md-3"><input type="date"></div>
		<div class="col-md-1"></div>
	</div>
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-2">
			<label for="">Deuda:</label>
		</div>
		<div class="col-md-2">########</div>
		<div class="col-md-1"></div>
		<div class="col-md-3">
			<label for="">Monto Libros Credito</label>
		</div>
		<div class="col-md-2">########</div>
		<div class="col-md-1"></div>
		
	</div>
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-2">
			<label for="">Saldo:</label>
		</div>
		<div class="col-md-3">#########</div>
		<div class="col-md-2">
			<label for="">Monto Pagado Libros Credito:</label>
		</div>
		<div class="col-md-3"></div>
		<div class="col-md-1"></div>
	</div>
	<hr>
	<table class="table">
		<thead>
			<tr>
				<th>Grupos</th>
				<th>Libros Asignados</th>
				<th>Libros Disponibles</th>
				<th>Libros Vendidos</th>
				<th>Libros a Credito</th>
			</tr>
		</thead>
		<tbody><?php foreach($this->model->ReporteGrupoZona() as $r): ?>
			<tr>
				<td><?php echo $r->nombre; ?></td>
				<td><?php echo $r->cantidad; ?></td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>
</div>