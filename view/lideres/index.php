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
							<a class="btn btn-primary btn-large" href="?c=Grupo&a=Index&idz=<?php echo $stm->zonaID;?>">Crear Grupos</a>
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

