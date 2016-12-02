<h3 class="text-center">Lista de libros de la Campaña</h3>
<table class="table">
	<thead>
		<tr>
			<th>Titulo</th>
			<th>Resumen</th>
			<th>Portada</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($this->model->listarCampaniaLibro() as $r): ?>
		<tr>
			<td><?php echo $r->titulo; ?></td>
			<td><?php echo $r->resumen; ?></td>
			<td><?php echo $r->imagen; ?></td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>
