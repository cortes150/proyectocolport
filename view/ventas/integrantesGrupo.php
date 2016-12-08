<h3 class="text-center">
	Integrantes del Grupo
</h3>
<table class="table">
	<thead>
	<tr>
		<th>Apellido</th>
		<th>Nombre</th>
		<th>Grupo</th>
		<th>Foto</th>
	</tr>
	</thead>
	<tbody>
	<?php foreach($this->model->ListarMiembros() as $r): ?>
		<tr>
			<td>
				<?php echo $r->apellid; ?>
			</td>
			<td>
				<?php echo $r->nombre; ?>
			</td>
			<td>
				<?php echo $r->grupos; ?>
				
			</td>
			<td>
				<?php echo $r->foto; ?>
				
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>