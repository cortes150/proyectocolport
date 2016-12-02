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
			<td>
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<img alt="Bootstrap Image Preview" style="width: 20%; height: 30%;" src="<?php echo $r->imagen; ?>" class="img-thumbnail" />
					</div>
				</div>
			</div>
			</td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>
