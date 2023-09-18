<?php 
	$datos_vehiculos = $trabajos->listarVehiculos();
	$datos_empleados = $trabajos->listarEmpleados();
?>
<div class="box-principal">
	<div class="panel panel-default">
	  <div class="panel-heading">
	    <h3 class="panel-title">Agregar un trabajo</h3>
	  </div>
	  <div class="panel-body">
	  	<div class="row">
	  		<div class="col-md-1"></div>
	  		<div class="col-md-10">
	  			<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
				    <div class="form-group">
				      <label for="id_vehiculo" class="control-label">Vehiculo</label>
				      <select required name="id_vehiculo" class="form-control selectpicker" data-live-search="true" autofocus>
				      		<option value="" selected disabled>Seleccione un vehiculo</option>
				      	<?php while($row_vehiculo = mysqli_fetch_array($datos_vehiculos)){ ?>
				      		<option value="<?php echo $row_vehiculo['id_vehiculo']; ?>"><?php echo strtoupper($row_vehiculo['patente']); ?></option>
				      	<?php } ?>
				      </select>
				    </div>
				    <div class="form-group">
				      <label for="id_empleado" class="control-label">Empleado asignado</label>
				      <select required name="id_empleado" class="form-control selectpicker" data-live-search="true">
				      		<option value="" selected disabled>Asigne un empleado al trabajo</option>
				      	<?php while($row_empleado = mysqli_fetch_array($datos_empleados)){ ?>
				      		<option value="<?php echo $row_empleado['id_empleado']; ?>"><?php echo ucfirst($row_empleado['nombre']) . " " . ucfirst($row_empleado['apellido']) . " - ". strtoupper($row_empleado['departamento']); ?></option>
				      	<?php } ?>
				      </select>
				    </div>
					<div class="form-group">
						<label class="control-label" for="detalle">Detalles del trabajo</label>
						<textarea class="form-control" name="detalle" rows="8" required></textarea>
					</div>
	              	<div class="form-group">
	              		<label class="control-label" for="ingreso">Fecha de ingreso: </label>
	                	<input class="form-control" name="ingreso" value="<?php echo date("Y-m-d"); ?>" type="date" required>
	              	</div>
		          	<div class="form-group">
		          		<label class="control-label" for="egreso">Fecha de entrega estimado: </label>
		            	<input class="form-control" name="egreso" value="" type="date" required>
		          	</div>
				    <div class="form-group">
				      <label for="estado" class="control-label">Estado del trabajo</label>
				      <select required name="estado" class="form-control">
				      		<option value="ini" selected>Iniciado</option>
				      		<option value="fin">Finalizado</option>
				      </select>
				    </div>		          	
				    <div class="form-group text-center">
				    	<a class="btn btn-default" href="<?php echo URL; ?>trabajos"><i class="fa fa-2x fa-fw fa-mail-reply-all"></i></a>
				    	<button type="submit" class="btn btn-default"><i class="fa fa-2x fa-fw fa-save"></i></button>
				        <button type="reset" class="btn btn-default"><i class="fa fa-2x fa-fw fa-refresh"></i></button>
				    </div>
				</form>
	  		</div>
	  		<div class="col-md-1"></div>
	  	</div>
	  </div>
	</div>
</div>