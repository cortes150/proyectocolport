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
		
		<?php foreach($this->model->listarAsignados() as $r): ?>
			<tr>
				<td><?php echo $r->name; ?></td>
				<td><?php echo $r->nameli; ?></td>
				<td><a class="btn btn-warning" href="?c=Compania&a=Crear">Agregar Grupos</a></td>
				<td><a class="btn btn-info" href="?c=Compania&a=Crear">Ver Grupos</a></td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>

<br>
<br>
<br>
<br>
<br>
<br>