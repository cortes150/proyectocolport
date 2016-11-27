<script src="assets/js/buscador.js"></script>
<h3 class="text-cente">Agregar Colportes al Grupo</h3>
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
		<th>Apellido</th>
		<th>C.I.</th>
		<th>Foto</th>
		<th><div class="checkbox">
	    <label>
	      <input type="checkbox"> Seleccionar todo
	    </label>
	  </div>
		</th>
	</tr>
	</thead>
	<tbody>
		<?php foreach($this->model->listarCompania() as $r): ?>
		<tr>
			<td>nose</td>
			<td>nose</td>
			<td>nose</td>
			<td>nose</td>
			<td>nose</td>
      <td>
      <div class="checkbox">
	    <label>
	      <input type="checkbox"> Check me out
	    </label>
	  </div>
      </td>
		</tr>
		<?php endforeach; ?>
	</tbody>
	</table>
</div>
