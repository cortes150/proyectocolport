<?php
session_start();
        ob_start();?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<nav class="navbar navbar-inverse navbar-static-top" role="navigation">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						 <span class="sr-only">Menu</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
					</button> <a class="navbar-brand" href="?c=Compania&a=Index"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> - Inicio</a>
				</div>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li class="">
							<a href="?c=usuario&a=index"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> - Usuarios</a>
						</li>
						<!--<li class="">
							<a href="?c=Compania&a=Index"><span class="glyphicon glyphicon-tower" aria-hidden="true"></span> - Campañas</a>
						</li>
						<li class="">
							<a href="?c=Libro&a=Index">Libros</a>
						</li>-->
						<li class="">
							<a href="?c=Colport&a=Index"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> - Agregar Colportores csv</a>
						</li>
						<li>
							<a href="?c=Reporte&a=Index"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> - Reporte</a>
						</li>
						<!--<li>
							<a href="?c=Grupo&a=Index">C-Grupos</a>
						</li>
						<li>
							<a href="?c=Grupo&a=Index">Asignar libros Lider</a>
						</li>-->
						
					</ul>
					
					<ul class="nav navbar-nav navbar-right">
					<li> <a ><span class="label label-danger"><?=$_SESSION['Tipo']?></span></a>
					</li>
						<li class="dropdown">
						
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?=$_SESSION['nick']?><strong class="caret"></strong>
						</a>
							<ul class="dropdown-menu">
								<li>
									<a href="?c=inicio&a=LoginExit">Cerrar Sessión</a>
								</li>
							</ul>

						</li>
					</ul>
				</div>

			</nav>
		</div>
	</div>
</div>