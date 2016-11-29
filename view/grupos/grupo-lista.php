<script src="assets/js/buscador.js"></script>
<h3 class="text-center">Lista de integrantes del Grupo</h3>
<hr>
<div class="row">
	<div class="col-md-12"><div class="input-group">
  <span class="input-group-addon" id="sizing-addon2"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
  <div id="buscar">
  <input type="search" class="light-table-filter form-control" data-table="order-table" placeholder="Buscar Colportor">
  </div>
</div></div>
</div>
<hr>
<div class="datagrid">
	<table class="order-table table text-center">
		<thead>
	<tr >
		<th class="text-center">Nombres</th>
		<th class="text-center">Apellido</th>
		<th class="text-center">Grupo</th>
	</tr>
	</thead>
	<tbody >
		<?php foreach($this->model->listarMiembrosColportoresGrupo() as $r): ?>
		<tr>
			<td><?php echo $r->nombre; ?></td>
			<td><?php echo $r->apellid; ?></td>
			<td><?php echo $r->grupos; ?></td>
      <td>
      </td>
		</tr>
		<?php endforeach; ?>
	</tbody>
	</table>
</div>

