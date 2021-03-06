<script src="assets/js/buscador.js"></script>
<h3>Lista de Campañas</h3>
<div class="well well-sm text-right">
    <a class="btn btn-success" href="?c=Compania&a=Crear">Agregar Campañas</a>
</div>
<div class="row">
	<div class="col-md-12"><div class="input-group">
  <span class="input-group-addon" id="sizing-addon2"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
  <div id="buscar">
  <input type="search" class="light-table-filter form-control" data-table="order-table" placeholder="Buscar Campaña">
  </div>
</div></div>
</div>
<div class="datagrid">
	<table class="order-table table">
		<thead>
	<tr >
		<th>Nombre</th>
    <th>Fecha Inicio</th>
    <th>Fecha Fin</th>
		<th>Temporada</th>
		<th>Estado</th>
    <th>Misión</th>
    <th>Agregar Archivo de CVS [Libros]</th>
	</tr>
	</thead>
	<tbody>
		<?php foreach($this->model->listarCompania() as $r): ?>
		<tr>
			<td><?php echo $r->nombreCampania; ?></td>
			<td><?php echo $r->fechaInicio; ?></td>
			<td><?php echo $r->fechaFinal; ?></td>
			<td><?php echo $r->temporada; ?></td>
			<td><?php echo $r->estado; ?></td>
      <td><?php echo $r->mision; ?></td>
      <td>
      <form action="?c=Libro&a=agregarLibro" method="post" enctype="multipart/form-data" name="form1">
      <input type="file" class="form-control" name="archivo" id="archivo">
      <input type="hidden" name="companiaID" value="<?php echo $r->companiaID; ?>">
      <button type="submit" name="button" class="btn btn-danger" id="button">Agregar <span class="glyphicon glyphicon-book" aria-hidden="true"></span></button>
      </form>
     </td>
     <td><a class="btn btn-success" href="?c=Zona&a=misionCrear&id=<?php echo $r->companiaID; ?>"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></a></td>
      <td><a class="btn btn-warning" href="?c=Zona&a=CrearZona&id=<?php echo $r->companiaID; ?>"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span></a></td>
      <td><a class="btn btn-info" href="?c=Zona&a=zonasLIstadas&id=<?php echo $r->companiaID; ?>"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a></td>
      <td><a class="btn btn-success" href="?c=Zona&a=LibrosAsignadosZonas&id=<?php echo $r->companiaID; ?>"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></a></td>
		</tr>
		<?php endforeach; ?>
	</tbody>
	</table>
</div>