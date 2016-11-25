<h1>Asisgnar Zona al lider</h1>
<form action="?c=Zona&a=guardar" method="post">
seleccione lider <br>
<select name="colportorID" class="form-control">
	<?php foreach($this->model->listarColportorLider() as $r): ?>
		<option value="<?php echo $r->id; ?>"><?php echo $r->Nombre; ?></option>		
		<?php endforeach; ?>
</select><br>
asignar zona <br>
<select name="zonaID" class="form-control">
<?php foreach($this->model->listarZonas() as $r): ?>
		<option value="<?php echo $r->zonaID; ?>"><?php echo $r->nombre; ?></option>		
		<?php endforeach; ?>
</select><br>
tipo de rol: <br> <label for="">Lider</label> <br>
<input class="form-control" type="submit" value="Crear">

</form>