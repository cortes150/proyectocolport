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
		<th>Coodinador</th>
		<th>Fecha Inicio</th>
		<th>Fecha Fin</th>
		<th>Temporada</th>
		<th>Estado</th>
    <th colspan="2">Opciones</th>
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
       <td><form action="?c=Libro&a=agregarLibro" method="post" enctype="multipart/form-data" name="form1">
      
      <strong>Agregar Archivo de CVS [Libros]</strong>
      <input type="file" name="archivo" id="archivo">
      <input type="hidden" name="companiaID" value="<?php echo $r->companiaID; ?>">
      <input type="submit" name="button" class="btn" id="button" value="Agregar Libros">
      </form>
     </td>
     <td><a class="btn btn-success" href="?c=Mision&a=Crear">Asignar Lider</a></td>
 
      <td><a class="btn btn-warning" href="?c=Zona&a=Inicio">Agregar Zonas</a></td>
      <td><a class="btn btn-info" href="?c=Zona&a=zonasLIstadas">Ver zonas Agregadas</a></td>
      <td><a class="btn btn-success" href="?c=Zona&a=zonasLIstadas">Agregadas Libros</a></td>
		</tr>
		<?php endforeach; ?>
	</tbody>
	</table>
</div>