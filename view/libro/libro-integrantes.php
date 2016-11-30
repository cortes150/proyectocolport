<div class="row">
	<div class="col-md-6">
		<table class="table">
			<thead>
				<tr>
					<th colspan="2">
					Nombre del Gurpo
					</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($this->model->librosIntegrantes() as $r): ?>
					<tr>
					
						<td><?php echo $r->nombre; ?></td>
						<td> <ul>
						<?php foreach ($this->model->mostrarColp($r->grupoID) as $r2):?>
						<li>	<?php echo $r2->nombres; ?></li>
						<?php endforeach; ?>
						</ul>
						</td>
					</tr>
				<?php endforeach; ?>
					
				
			</tbody>
		</table>
	</div>
	<div class="col-md-6">
		<table class="table">
			<thead>
				<tr>
					<th colspan="2">
					Libros
					</th>
					<th>
						cantidad
					</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Nombre Libro</td>
					<td>
						<input type="checkbox">
					</td>
					<td>
						<input type="text">
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>