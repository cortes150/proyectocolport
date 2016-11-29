<script src="assets/js/buscador.js"></script>
<script type="text/javascript">
	function marcar(source) 
	{
		checkboxes=document.getElementsByTagName('input'); //obtenemos todos los controles del tipo Input
		for(i=0;i<checkboxes.length;i++) //recoremos todos los controles
		{
			if(checkboxes[i].type == "checkbox") //solo si es un checkbox entramos
			{
				checkboxes[i].checked=source.checked; //si es un checkbox le damos el valor del checkbox que lo llamó (Marcar/Desmarcar Todos)
			}
		}
	}
</script>
<h3 class="text-center">Agregar Colportes al Grupo</h3>
<hr>
<div class="row">
	<div class="col-md-12"><div class="input-group">
  <span class="input-group-addon" id="sizing-addon2"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
  <div id="buscar">
  <input type="search" class="light-table-filter form-control" data-table="order-table" placeholder="Buscar Colportes">
  </div>
</div></div>
</div>
<hr>
<div class="datagrid">
	<table class="order-table table text-center">
		<thead>
	<tr >
		<th class="text-center">Nombre</th>
		<th class="text-center">Apellido</th>
		<th class="text-center">C.I.</th>
		<form action="?c=Grupo&a=AgregarColportor" method="POST">
		<th class="text-center">Marcar/Desmarcar Todo
	    <label class="text-center">
	    	<input id="todos" type="checkbox" onclick="marcar(this);"> 
	    </label>
	    
		</th>
		<th><input type="submit" value="Agregar Colportores al Grupo"></th>
	</tr>
	</thead>
	<tbody >
		<?php foreach($this->model->listarMiembrosColportores() as $r): ?>
		<tr>
			<td><?php echo $r->nombres; ?></td>
			<td><?php echo $r->apellido; ?></td>
			<td><?php echo $r->ci; ?></td>
      <td>
      <div class="checkbox">
	    <label>
	      <input type="checkbox" name="miembroID[]" value="<?php echo $r->miembroID; ?>">
	    <input type="hidden" name="grupoID" value="<?php echo $_GET['idg'] ?>">
	    <input type="hidden" name="idz" value="<?php echo $_GET['idz'] ?>">
	    </label>
	  </div>
      </td>
		</tr>
		<?php endforeach; ?>
		<tr>
			<td colspan="3"></td>
			<td></td>
		</tr>
	</form>
	</tbody>
	</table>
</div>

