<form action="?c=Colport&a=Subir" method="post" enctype="multipart/form-data" name="form1">
<table width="90%" border="0">
  <tr>
    <td>
      <strong>Agregar Archivo de CVS [Colpoltores]</strong>
      
      <input type="file" name="archivo" id="archivo">
      
      <label><input type="radio" name="radio" value="s" checked />SI</label>
      <label><input type="radio" name="radio" value="n" />NO</label>
<input type="submit" name="button" class="btn" id="button" value="Agregar Colpoltores">
    </td>
    </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
</form>

<table class="table">
  <thead>
  <tr>
    <th>Nombre</th>
    <th>Apellido</th>
    <th>Ci</th>
    <th>Nacimiento</th>
    <th>Pais</th>
    <th>Ciudad</th>
    <th>Universidad</th>
    <th>Facultad</th>
  </tr>
  </thead>
  <tbody>
    <?php foreach($this->model->listarColpoltor() as $r): ?>
    <tr>
      <td><?php echo $r->primerNombre; ?></td>
      <td><?php echo $r->segundoNombre; ?></td>
      <td><?php echo $r->apellido; ?></td>
      <td><?php echo $r->ci; ?></td>
      <td><?php echo $r->nacimiento; ?></td>
      <td><?php echo $r->pais; ?></td>
      <td><?php echo $r->ciudad; ?></td>
      <td><?php echo $r->universidad; ?></td>
      <td><?php echo $r->facultad; ?></td>
      <td><?php echo $r->carrera; ?></td>
      <td>
     
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>




<!-- <div class="well well-sm text-right">
   <div class="row">
	<div class="col-md-4"></div>
	<div class="col-md-5">
   <input type="file" id="csv" name="csv" value="Importar Colpoltores" class="form-control "> 
   <input type="submit" value="Importar" href="?c=Colport&a=Subir"> </div>
	
	<div class="col-md-3"><a class="btn btn-success" href="?c=Colport&a=Subir">Agregar Colportores Csv</a></div>
</div>
</div> -->


<!-- <form action="importar.php" enctype="multipart/form-data" method="post">
   <input id="archivo" accept=".csv" name="archivo" type="file" /> 
   <input name="MAX_FILE_SIZE" type="hidden" value="20000" /> 
   <input name="enviar" type="submit" value="Importar" />
   <div class="col-md-3"><a class="btn btn-success" href="?c=Colport&a=Subir">Agregar Colportores Csv</a></div>
</form> -->
<!-- <section>
<form id="subida" action="?c=Colport&a=Subir" method="post">
<table>
   <tr>
      <td><input type="file" id="csv" name="csv" /></td>
    </tr>
    <tr>
      <td><input type="submit" value="Importar"/></td>
    </tr>
    <tr>
      <td id="respuesta"></td>
    </tr>
    
</table>
</form>
</section> -->