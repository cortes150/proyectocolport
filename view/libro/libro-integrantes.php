<script type="text/javascript">
	function marcar(source) 
	{
		//getElementById y getElementsByTagName
		checkboxes=document.getElementsByTagName('input'); //obtenemos todos los controles del tipo Input
		for(i=0;i<checkboxes.length;i++) //recoremos todos los controles
		{
			if(checkboxes[i].id == "todos") //solo si es un checkbox entramos
			{
				checkboxes[i].checked=source.checked; 
			}
		}
	}
</script>
<form name="Formulario" action="?c=libro&a=MiembroLibro" method="post" >
<div class="row">
	<div class="col-md-6">
		<table class="table table-hover table-striped">
			<thead>
				<tr>
					<th colspan="2">
					Nombre del Gurpo
					</th>
					<th>Seleccionar Todos
					<input id="todos" type="checkbox" onclick="marcar(this);"></th>
				</tr>
			</thead>


			<tbody>
				<?php foreach($this->model->librosIntegrantes() as $r): ?>
					<tr>
						
						<td><?php echo $r->nombre; ?> </td>
						<td>
						<table class="table">
						<tr>
							<th>Colportores</th>
							<th>
								
							</th>
						</tr>
							<?php foreach ($this->model->mostrarColp($r->grupoID) as $r2):?>
							<tr>
								<td><?php echo $r2->nombres; ?></td>
								<td><input id="todos" type="checkbox" name="miembroID[]" value="<?php echo $r2->miembroID; ?>"></td>
							</tr>							
						<?php endforeach; ?>
						</table>
						</td>
					</tr>
				<?php endforeach; ?>
					
				
			</tbody>
		</table>
	</div>
	<div class="col-md-6">
		<table class="table table-hover table-striped">
			<thead>
				<tr>
					<th>
					Libros
					</th>
					<th>
						Cantidad Existente
					</th>
					<th>Seleccionar</th>
					<th>
					Asignar/Cant</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach($this->model->listarLibro() as $r): ?>
					<form action>
				<tr>
					<td><?php echo $r->titulo; ?></td>
					<td><?php echo $r->cantidad; ?></td>
					<td>
						<input type="checkbox" name="libroID[]" value="<?php echo $r->libroID; ?>" id="CBId">
					</td>
					<td>
					<div class="row"><input type="hidden" name="precioLibro[]" value="<?php echo $r->precioOficial; ?>">
						<div class="col-md-6" ><input type="text" name="cantidad[]" class="form-control" id="testP" style="display: none;" /></div>
					</div>
					</td>
				</tr>
					</form>
			<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>
<div class="row">
<div class="col-md-3"></div>
	<div class="col-md-6">
		<input type="submit" class="btn btn-success btn-block">
	</div>
<div class="col-md-3"></div>
</div>
</form>
 

<!--<form name="nombreDelFormulario">
onclick = "nombredeltext.disabled = !this.checked;
	<input type="checkbox" onclick="javascript:valida(this.checked)" />
        <input name="nsocio" type="text"  id="nsocio" disabled/>
</form> -->


<!--<form name="form"> 
<input type="checkbox" name="check1" onclick="check(1)" /> 
<input type="text" name="text1" disabled /> Text 1 <br /> 
<input type="checkbox" name="check2" onclick="check(3)" /> 
<input type="text" name="text2" disabled /> Text 2 <br /> 
<input type="checkbox" name="check3" onclick="check(5)" /> 
<input type="text" name="text3" disabled /> Text 3 <br /> 
<input type="checkbox" name="check4" onclick="check(7)" /> 
<input type="text" name="text4" disabled /> Text 4 <br /> 
<input type="checkbox" name="check5" onclick="check(9)" /> 
<input type="text" name="text5" disabled /> Text 5 <br /> 
</form> -->

<form>
    <input type="checkbox" name="CBName" id="CBId" /> Show Inputs
    <p id="testP">Test</p>
</form>
<script type="text/javascript">
    var checkActive = false;
    $(document).ready(function() {
        $('#CBId').change(function() {
            if(checkActive == false) {
                $('#testP').css('display', 'block');
                checkActive = true;
            } else {
                $('#testP').css('display', 'none');
                checkActive = false;
            }
        });
    });
</script>