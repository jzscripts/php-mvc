<div class="box-principal">
	<div class="panel panel-default">
	  <div class="panel-heading">
	    <h3 class="panel-title">Agregar un vehiculo</h3>
	  </div>
	  <div class="panel-body">
	  	<div class="row">
	  		<div class="col-md-1"></div>
	  		<div class="col-md-10">
	  			<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
				    <div class="form-group">
				      <label for="patente" class="control-label">Patente</label>
				        <input class="form-control" name="patente" type="text" autofocus required>
				    </div>
				    <div class="form-group">
				      <label for="modelo" class="control-label">Modelo</label>
				        <input class="form-control" name="modelo" type="text" required>
				    </div>			
					<div class="form-group">
						<label class="control-label" for="detalle">Detalle</label>
						<textarea class="form-control" name="detalle" required></textarea>
					</div>
				    <div class="form-group">
				      <label for="id_cliente" class="control-label">Cliente</label>
				      <select name="id_cliente" class="form-control selectpicker" data-live-search="true">
				      		<option value="0" selected disabled>Seleccione un cliente</option>
				      	<?php while($row = mysqli_fetch_array($datos)){ ?>
				      		<option value="<?php echo $row['id_cliente']; ?>"><?php echo ucfirst($row['nombre']) . " " . ucfirst($row['apellido']); ?></option>
				      	<?php } ?>
				      </select>
				    </div>					    
				    <div class="form-group text-center">
				    	<a class="btn btn-default" href="<?php echo URL; ?>vehiculos"><i class="fa fa-2x fa-fw fa-mail-reply-all"></i></a>
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