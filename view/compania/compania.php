<script src="assets/js/buscador.js"></script>
<h1>Lista de Campañas</h1>
<div class="well well-sm text-right">
    <a class="btn btn-success" href="?c=Compania&a=Crear">Agregar Campañas</a>
</div>

<hr>
<div class="row">
	<div class="col-md-12"><div class="input-group">
  <span class="input-group-addon" id="sizing-addon2"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
  <div id="buscar">
  <input type="search" class="light-table-filter form-control" data-table="order-table" placeholder="Buscar Campaña">
  </div>
</div></div>
</div>

<hr>
<hr>
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
      <input type="submit" name="button" class="btn btn-danger" id="button" value="Agregar Libros">
      </form>
     </td>
     <td><a class="btn btn-success btn-sm" href="?c=Zona&a=misionCrear">Asignar Lider</a></td>
      <td><a class="btn btn-warning btn-sm" href="?c=Zona&a=CrearZona&id=<?php echo $r->companiaID; ?>">Agregar Zonas</a></td>
      <td><a class="btn btn-info btn-sm" href="?c=Zona&a=zonasLIstadas">Ver zonas Agregadas</a></td>
      <td><a class="btn btn-success btn-sm" href="?c=Zona&a=zonasLIstadas">Agregadas Libros</a></td>
		</tr>
		<?php endforeach; ?>
	</tbody>
	</table>
</div>
