<div class="row">
  <div class="col-md-2"></div>
  <div class="col-md-8">
      <h3 class="text-center">Agregar Archivo de CVS [Colpoltores]</h3>
  </div>
  <div class="col-md-2"></div>
</div>
<hr>
<div class="row">
  <div class="col-md-1"></div>
<form action="?c=Colport&a=Subir" method="post" enctype="multipart/form-data" name="form1">
  <div class="col-md-4"><input type="file" class="form-control" name="archivo" id="archivo"></div>
  <div class="col-md-3"><button type="submit" name="button" class="btn btn-primary btn-block" id="button"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Agregar Colpoltores</button>
  </div>
</form>
  <div class="col-md-2">
    <button class="btn btn-info btn-block" data-toggle="modal" data-target=".bs-example-modal-sm">Ver Repetidos</button>
  </div>
  <div class="col-md-2"></div>
</div>
<table class="table">
  <thead>
  <tr>
    <th>Nombre</th>
    <th>SecNombre</th>
    <th>Apellido</th>
    <th>Ci</th>
    <th>Nacimiento</th>
    <th>Pais</th>
    <th>Ciudad</th>
    <th>Universidad</th>
    <th>Facultad</th>
    <th>Carrerra</th>
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