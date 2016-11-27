<h3 class="text-center">Lista de Grupos</h3>
<hr>
<div class="well well-sm text-right">
   <div class="row">
	<div class="col-md-4"></div>
	<div class="col-md-3"><a class="btn btn-success" href="?c=Grupo&a=CrearGrupo">Crear Grupos</a></div>
</div>
</div>
<table class="table">
	<thead>
		<tr>
			<th>Nombre Del Grupo</th>
			<th>Zona</th>
		</tr>
	</thead>
	<tbody>

	<?php foreach($this->model->ListarGrupo() as $r): ?>
    <tr>
      <td><?php echo $r->name; ?></td>
      <td><?php echo $r->namezona; ?></td>
      <td><a class="btn btn-success" href="?c=Grupo&a=AddColportor">Añadir Colportores</a></td>
    </tr>
    <?php endforeach; ?>
	</tbody>
</table>