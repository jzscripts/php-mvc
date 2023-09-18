<?php 
	$datos_2 = $empleados->listarDepartamentos();
?>
<div class="box-principal">
	<div class="panel panel-default">
	  <div class="panel-heading">
	    <h3 class="panel-title">Editar cliente <?php echo ucfirst($datos['nombre']); ?></h3>
	  </div>
	  <div class="panel-body">
	  	<div class="row">
	  		<div class="col-md-1"></div>
	  		<div class="col-md-10">
	  			<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
				    <div class="form-group">
				      <label for="nombre" class="control-label">Nombre</label>
				        <input class="form-control" name="nombre" type="text" value="<?php echo ucfirst($datos['nombre']); ?>" autofocus required>
				    </div>
				    <div class="form-group">
				      <label for="apellido" class="control-label">Apellido</label>
				        <input class="form-control" name="apellido" type="text" value="<?php echo ucfirst($datos['apellido']); ?>" required>
				    </div>			
				    <div class="form-group">
				      <label for="dni" class="control-label">DNI</label>
				        <input class="form-control" name="dni" type="text" value="<?php echo $datos['dni']; ?>" required>
				    </div>
				    <div class="form-group">
				      <label for="domicilio" class="control-label">Domicilio</label>
				        <input class="form-control" name="domicilio" type="text" value="<?php echo $datos['domicilio']; ?>" required>
				    </div>						    
				    <div class="form-group">
				      <label for="telefono" class="control-label">Telefono</label>
				        <input class="form-control" name="telefono" type="text" value="<?php echo $datos['telefono']; ?>">
				    </div>				    
				    <div class="form-group">
				      <label for="id_departamento" class="control-label">Departamento</label>
				      <select name="id_departamento" class="form-control selectpicker" data-live-search="true">
				      	<?php while($row_2 = mysqli_fetch_array($datos_2)){ ?>
				      		<option value="<?php echo $row_2['id_departamento']; ?>" <?php if ($row_2['departamento']==$datos['departamento']) echo "selected"; ?>><?php echo ucfirst($row_2['departamento']); ?></option>
				      	<?php } ?>
				      </select>
				    </div>
   				    <input value="<?php echo $datos['id_empleado']; ?>" name="id" type="hidden">
				    <div class="form-group text-center">
				    	<a class="btn btn-default" href="<?php echo URL; ?>empleados"><i class="fa fa-2x fa-fw fa-mail-reply-all"></i></a>
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