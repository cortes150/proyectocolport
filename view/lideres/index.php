<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<h3 class="text-center">
				Bienvenido al Portal de Lider
			</h3>
			<div class="jumbotron">
				<div class="row">
					<div class="col-md-8">
						<h2>
							Bienvenid@
						</h2>
						<p>
							...
						</p>
						<?php $stm=$this->model->PerfilLider(); ?>
						<p>
							<a class="btn btn-primary btn-large" href="?c=Grupo&a=Index&idz=<?php echo $stm->zonaID;?>">Ver Grupos</a>
						</p>
					</div>
					<div class="col-md-4">
						<img alt="Bootstrap Image Preview" src="http://lorempixel.com/140/140/" class="img-thumbnail" />
					</div>
				</div>
			</div> 
			<div class="row">
				<div class="col-md-6">
					<blockquote>
						<p>
							Nombre
						</p> <small><?php echo $stm->nombres; ?></cite></small>
					</blockquote>
				</div>
				<div class="col-md-6">
					<blockquote>
						<p>
							Apellido
						</p> <small><?php echo $stm->apellido; ?></small>
					</blockquote>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<blockquote>
						<p>
							Campaña
						</p> <small><?php echo $stm->nombreCampania; ?></small>
					</blockquote>
				</div>
				<div class="col-md-6">
					<blockquote>
						<p>
							Zona Asignada
						</p><small><?php echo $stm->nombreZona; ?></small>
					</blockquote>
				</div>
			</div>
		</div>
	</div>
</div>
<hr>
	<div class="row">
		<div class="col-md-12">
			<table class="table">
				<thead>
					<tr>
						<th>Colportes Con libros Asignados</th>
						<th>Libros Asignados</th>
						
					</tr>
				</thead>
				<tbody>
				<?php foreach($this->model->listarColportoresLibros() as $r): ?>
					<tr>
						<td><?php echo $r->name; ?></td>
						<td>
							<a class="btn btn-primary" href="?c=Zona&a=MIembroLibroAsignado&id=<?php echo $r->miemID; ?>">Ver Detalles</a>
						</td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>

<!-- Large modal 
<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Large modal</button>

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      ...
    </div>
  </div>
</div>-->