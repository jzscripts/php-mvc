<?php 
	$datos_2 = $vehiculos->listarClientes();
?>
<div class="box-principal">
	<div class="panel panel-default">
	  <div class="panel-heading">
	    <h3 class="panel-title">Editar vehiculo <?php echo strtoupper($datos['patente']); ?></h3>
	  </div>
	  <div class="panel-body">
	  	<div class="row">
	  		<div class="col-md-1"></div>
	  		<div class="col-md-10">
	  			<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
				    <div class="form-group">
				      <label for="patente" class="control-label">Patente</label>
				        <input class="form-control" name="patente" type="text" value="<?php echo strtoupper($datos['patente']); ?>" autofocus required>
				    </div>
				    <div class="form-group">
				      <label for="modelo" class="control-label">Modelo</label>
				        <input class="form-control" name="modelo" type="text" value="<?php echo ucfirst($datos['modelo']); ?>" required>
				    </div>			
				    <div class="form-group">
				      <label for="detalle" class="control-label">Detalle</label>
				        <input class="form-control" name="detalle" type="text" value="<?php echo $datos['detalle']; ?>" required>
				    </div>
				    <div class="form-group">
				      <label for="id_cliente" class="control-label">Cliente</label>
				      <select name="id_cliente" class="form-control selectpicker" data-live-search="true">
				      	<?php while($row_2 = mysqli_fetch_array($datos_2)){ ?>
				      		<option value="<?php echo $row_2['id_cliente']; ?>" <?php if ($row_2['id_cliente']==$datos['id_cliente']) echo "selected"; ?>><?php echo ucfirst($row_2['nombre']) . " " . ucfirst($row_2['apellido']); ?></option>
				      	<?php } ?>
				      </select>
				    </div>		
   				    <input value="<?php echo $datos['id_cliente']; ?>" name="id" type="hidden">
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