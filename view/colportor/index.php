<h3 class="text-center">BienVenido Colportor</h3>
<?php $tcontado=0;
	$tcredito=0; 
	$disponible=0;?>

			<?php foreach($this->model->listarColportoresLibrosID() as $r): ?>
			
			<?php $r->titulo; ?>
			<?php $r->ls; ?>
				<?php //$dis=$this->model->Disponible($r->libroID);if ($dis!=NULL) {echo "<td>".$dis->disponible."</td>";} else{ echo "<td>$r->ls</ td>"; } ?>
				<?php $lcont=$this->model->LibroContado($r->libroID);
				if ($lcont!=NULL) 
				{
					$lcont->cant;
					$tcontado=$tcontado+$lcont->cant;
				}
				 else{
				  //echo "0"; 
				  } ?>
			
				<?php $lcre=$this->model->LibroCredito($r->libroID);
				if ($lcre!=NULL) 
				{
					$lcre->credito;
					$tcredito=$tcredito+$lcre->credito;
				}
				 else{
				  //echo "0"; 
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

					 $dispo=(($r->ls)-($CantidadCont+$CantidadCredito));  
					$disponible=$disponible+$dispo;
					//$sum=$disponible;
					?>

			<?php endforeach; ?>

	


			<?php $stm=$this->model->NombreMiembro(); ?>
<h3 class="text-center">Compañia a la que pertenece: <?php echo $stm->compania; ?> </h3>
			
<h3 class="text-center">Detalle de Libros Asignado</h3>
<hr>
<div class="row">
			<div class="form-group">
			<div class="col-md-2"><label for="">
				Nombre Colportor</label></div>
			<div class="col-md-2"><label class="form-control">
				<?php echo $stm->primerNombre; ?></label></div>
			<div class="col-md-2"><label class="form-control">
				<?php echo $stm->segundoNombre; ?></label></div>
			<div class="col-md-3">
				<label class="form-control"><?php echo $stm->apellido; ?></label>
			</div>
			</div>
</div>

<div class="row">
	<div class="col-md-2">
	<?php $deuda=$this->model->Deuda(); ?>
	<label>Deuda:</label></div>
	<div class="col-md-2">
		<label  class="form-control"><?php echo $deuda->precio; ?></label>
	</div>
	<div class="col-md-2">
	<?php $ganancia=$this->model->Ganancia(); ?>
	<label><font color="red">ganancia:</font></label></div>
	<div class="col-md-1">

		<label  class="form-control" style="color: red;"><?php echo $ganancia->ganancia; ?></label>
	</div>

	<div class="col-md-2">
	<label>Libro Contado</label></div>
	<div class="col-md-2">
		<label  class="form-control"><?php echo $tcontado; ?></label>
	</div>

	<div class="col-md-2">
	<label>Libro Credito</label></div>
	<div class="col-md-2">
		<label  class="form-control"><?php echo $tcredito; ?></label>
	</div>
</div>
<div class="row">
	<div class="col-md-2">
	<?php $tla=$this->model->TotalLibrosAsignados(); ?>
	<label>Total Libros Asignados</label></div>
	<div class="col-md-2">
		<label  class="form-control"><?php echo $tla->tla; ?></label>
	</div>
	<div class="col-md-2">
	<label>Total Libros Disponibles</label></div>
	<div class="col-md-2">
		<label  class="form-control"><?php echo $disponible;?></label>
	</div>
</div>
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
		<?php $tcontado=0;
	$tcredito=0; 
	$disponible=0;?>
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
					$tcontado=$tcontado+$lcont->cant;
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
	<th><?php echo $tla->tla; ?></th>
	<th><?php echo $tcontado; ?></th>
	<th><?php echo $tcredito; ?></th>
	<th><?php echo $disponible;?></th>
</tr>
			
		</tbody>
	</table>
</div>

