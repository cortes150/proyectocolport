<h3 class="text-center">Lista de Grupos</h3>
<hr>
<div class="well well-sm text-right">
   <div class="row">
	<div class="col-md-4"></div>
	<div class="col-md-3"><a class="btn btn-success" href="?c=Grupo&a=CrearGrupo&idz=<?php echo $_GET['idz'] ?>">Crear Grupos</a></div>
</div>
</div>
<table class="table">
	<thead>
		<tr>
			<th>Nombre Del Grupo</th>
			<th>Zona</th>
			<th colspan="2" class="text-center">Opciones</th>
			<th>Entregar Libros</th>
		</tr>
	</thead>
    <form action="?c=libro&a=IntegrantesLibros" method="POST">
	<tbody>
	<?php foreach($this->model->ListarGrupo() as $r): ?>
    <tr>
      <td><?php echo $r->nombreGrupo; ?></td>
      <td><?php echo $r->nombreZona; ?></td>
      <td><a class="btn btn-success" href="?c=Grupo&a=AddColportor&idg=<?php echo $r->grupoID; ?>&idz=<?php echo $_GET['idz'] ?>">Añadir Colportores</a></td>
      <td><a class="btn btn-info" href="?c=Grupo&a=ListaGrupo&idg=<?php echo $r->grupoID; ?>&idz=<?php echo $_GET['idz'] ?>">Ver Colportores del Grupo</a></td>
      <td>
      <div class="checkbox">
	    <label>
      <input type="hidden" name="zonaID" value="<?php echo $r->zonaID; ?>">
      	<input type="checkbox" name="grupoID[]" class="form-control" value="<?php echo $r->grupoID; ?>">
      	</label>
      	</div>
      </td>
    </tr>
    <?php endforeach; ?>
    <tr>
    	<td colspan="4"></td>
    	<td>
    		<input type="submit" value="Agregar Ligros Grupos">
    	</td>
   	</form>
    </tr>
	</tbody>
</table>