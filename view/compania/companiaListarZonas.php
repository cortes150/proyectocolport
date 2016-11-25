<h3 class="text-center">Lista de los grupos asignados</h3>
<hr>
<div class="container">
  <table class="table">
    <thead>
      <tr>
        <th>Nombre Completo</th>
        <th>Zona Asignada</th>
        <th>Grupos</th>
      </tr>
    </thead>
    <tbody>
    
    <?php foreach($this->model->listarAsignados() as $r): ?>
      <tr>
        <td><?php echo $r->name; ?></td>
        <td><?php echo $r->nameli; ?></td>
        <td><a class="btn btn-warning" href="?c=Reporte&a=Index&id=<?php echo $r->id; ?>&idz=<?php echo $r->idz; ?>">Venta de Grupos</a></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>