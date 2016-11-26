<?php
 		//session_start();
		//$conexion = mysql_connect("localhost","root","");
		//mysql_select_db("colport",$conexion);		
?>
<h1>lista de Libros</h1>
<hr>
<div class="well well-sm text-right">
   <div class="row">
	<div class="col-md-4"></div>
	<div class="col-md-5"><input type="file" value="Importar Libros" class="form-control"> <input type="submit" value="Importar"> </div>
	<div class="col-md-3"><a class="btn btn-success" href="?c=Libro&a=Crear">Agregar Libro</a></div>
</div>
</div>
<hr>
<table class="table">
	<thead>
	<tr>
		<th>Titulo</th>
		<th>Resumen</th>
		<th>Precio Oficial</th>
		<th>Precio Venta</th>
		<th>Imagen</th>
	</tr>
	</thead>
	<tbody>
		<?php foreach($this->model->listarLibro() as $r): ?>
		<tr>
			<td><?php echo $r->titulo; ?></td>
			<td><?php echo $r->resumen; ?></td>
			<td><?php echo $r->precioOficial; ?></td>
			<td><?php echo $r->precioVenta; ?></td>
			<td>
			<div class="col-md-4">
			<img src="<?php echo $r->imagen; ?>" class="img-thumbnail"/>
			</div>
			</td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>

<hr>
<hr>
<hr>
<div align="center">
<form action="?c=libro&a=agregarLibro" method="post" enctype="multipart/form-data" name="form1">
<table width="90%" border="0">
  <tr>
    <td>
      <strong>Agregar Archivo de Excel [Productos]</strong>
      
      <input type="file" name="archivo" id="archivo">
      <strong>Desea Actualizar la BD</strong>
      <label><input type="radio" name="radio" value="s" checked />SI</label>
      <label><input type="radio" name="radio" value="n" />NO</label>
      
<input type="submit" name="button" class="btn" id="button" value="Actualizar Base de Datos">
    </td>
    </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
</form>
<?php
	
?>