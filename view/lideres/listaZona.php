<h3 class="text-center">Lista de los grupos asignados</h3>
<hr>
<div class="container">
	<table class="table">
		<thead>
			<tr>
				<th>Nombre Completo</th>
				<th>Zona Asignada</th>
				<th>Grupos</th>
				<th colspan="2">Grupos</th>
			</tr>
		</thead>
		<tbody>
		
		<?php foreach($this->model->listarAsignadosCampania() as $r): ?>
			<tr>
				<td><?php echo $r->nombre; ?></td>
				<td><?php //echo $r->nameli; ?></td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>