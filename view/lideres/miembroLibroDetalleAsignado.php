<?php $tcontado=0;
	$tcredito=0; 
	$disponible=0;?>
<h3 class="text-center">Detalle de Libros Asigado</h3>
<hr>
<div class="row">
			<?php $stm=$this->model->NombreMiembro(); ?>
			<div class="form-group">
			<div class="col-md-3"><label for="">
				Nombre Colportor</label></div>
			<div class="col-md-3"><label class="form-control">
				<?php echo $stm->primerNombre; ?></label></div>
			<div class="col-md-3"><label class="form-control">
				<?php echo $stm->segundoNombre; ?></label></div>
			<div class="col-md-3">
				<label class="form-control"><?php echo $stm->apellido; ?></label>
			</div>
			</div>
</div>
<div class="row">
	<div class="col-md-2">
	<?php $deuda=$this->model->Deuda(); ?>
	<label class="text-right">Deuda:</label></div>
	<div class="col-md-2">
		<label  class="form-control"><?php echo $deuda->precio; ?></label>
	</div>
	<div class="col-md-2">
	<label>Libro Contado</label></div>
	<div class="col-md-2">
		<label  class="form-control"><?php echo $tcontado; ?></label>
	</div>

</div>

	<?php $tla=$this->model->TotalLibrosAsignados(); ?>
<div class="row">
	<table class="table">
		<thead>
			<tr>
				<th>Libro de Campaña</th>
				<th>Libro Asignado</th>
				<th>Libro al Contado</th>
				<th>Libro Credito</th>
				<th>Disponible</th>
			</tr>
		</thead>
		<tbody>
			<?php
			
			foreach($this->model->listarColportoresLibrosID() as $r): ?>
			<tr>
				<td><?php echo $r->titulo; ?></td>
				<td><?php echo $r->ls; ?></td>
				<?php //$dis=$this->model->Disponible($r->libroID);if ($dis!=NULL) {echo "<td>".$dis->disponible."</td>";} else{ echo "<td>$r->ls</ td>"; } ?>
				<?php $lcont=$this->model->LibroContado($r->libroID);
				if ($lcont!=NULL) 
				{
					echo "<td>".$lcont->cant."</td>";
					$tcontado=+$lcont->cant;
				}
				 else{
				  echo "<td>0</ td>"; 
				  } ?>
			
				<?php $lcre=$this->model->LibroCredito($r->libroID);
				if ($lcre!=NULL) 
				{
					echo "<td>".$lcre->credito."</td>";
					$tcredito=$tcredito+$lcre->credito;
				}
				 else{
				  echo "<td>0</ td>"; 
				  } ?>
				<td>
					<?php 
							if ($lcont!=NULL) {
								$CantidadCont=$lcont->cant;
							}
							else{
								//echo "string";
								$CantidadCont=0;
							}
							if ($lcre!=NULL) {


								$CantidadCredito=$lcre->credito;
							}
							else{
								$CantidadCredito=0;
							}

					echo $dispo=(($r->ls)-($CantidadCont+$CantidadCredito));  
					$disponible=$disponible+$dispo;
					//$sum=$disponible;
					?>

				</td>
			</tr>
			<?php endforeach; ?>
<tr>
	<th>Totales</th>
	<th>T. Libro Asignado: <?php echo $tla->tla; ?></th>
	<th>T. libro al Contado: <?php echo $tcontado; ?></th>
	<th>T. libro Credito: <?php echo $tcredito; ?></th>
	<th>T. Disponible: <?php echo $disponible;?></th>
</tr>
			
		</tbody>
	</table>
</div>

