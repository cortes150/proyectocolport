<script type="text/javascript">
(function(document) {
  'use strict';

  var LightTableFilter = (function(Arr) {

    var _input;

    function _onInputEvent(e) {
      _input = e.target;
      var tables = document.getElementsByClassName(_input.getAttribute('data-table'));
      Arr.forEach.call(tables, function(table) {
        Arr.forEach.call(table.tBodies, function(tbody) {
          Arr.forEach.call(tbody.rows, _filter);
        });
      });
    }

    function _filter(row) {
      var text = row.textContent.toLowerCase(), val = _input.value.toLowerCase();
      row.style.display = text.indexOf(val) === -1 ? 'none' : 'table-row';
    }

    return {
      init: function() {
        var inputs = document.getElementsByClassName('light-table-filter');
        Arr.forEach.call(inputs, function(input) {
          input.oninput = _onInputEvent;
        });
      }
    };
  })(Array.prototype);

  document.addEventListener('readystatechange', function() {
    if (document.readyState === 'complete') {
      LightTableFilter.init();
    }
  });

})(document);
</script>
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
      <td><a class="btn btn-warning" href="?c=Zona&a=Inicio">Agregar Zonas</a></td>
      <td><a class="btn btn-info" href="?c=Zona&a=zonasLIstadas">Ver zonas Agregadas</a></td>
      <td><a class="btn btn-success" href="?c=Zona&a=zonasLIstadas">Agregadas Libros</a></td>
		</tr>
		<?php endforeach; ?>
	</tbody>
	</table>
</div>