<div class="box-principal">
	<div class="panel panel-default">
	  <div class="panel-heading">
	    <h3 class="panel-title">Agregar un empleado</h3>
	  </div>
	  <div class="panel-body">
	  	<div class="row">
	  		<div class="col-md-1"></div>
	  		<div class="col-md-10">
	  			<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
				    <div class="form-group">
				      <label for="nombre" class="control-label">Nombre</label>
				        <input class="form-control" name="nombre" type="text" autofocus required>
				    </div>
				    <div class="form-group">
				      <label for="apellido" class="control-label">Apellido</label>
				        <input class="form-control" name="apellido" type="text" required>
				    </div>			
				    <div class="form-group">
				      <label for="dni" class="control-label">DNI</label>
				        <input class="form-control" name="dni" type="text" required>
				    </div>
				    <div class="form-group">
				      <label for="domicilio" class="control-label">Domicilio</label>
				        <input class="form-control" name="domicilio" type="text" required>
				    </div>				    
				    <div class="form-group">
				      <label for="telefono" class="control-label">Telefono</label>
				        <input class="form-control" name="telefono" type="text>">
				    </div>
				    <div class="form-group">
				      <label for="id_departamento" class="control-label">Departamento</label>
				      <select name="id_departamento" class="form-control selectpicker" data-live-search="true">
				      	<?php while($row = mysqli_fetch_array($datos)){ ?>
				      		<option value="<?php echo $row['id_departamento']; ?>"><?php echo ucfirst($row['departamento']); ?></option>
				      	<?php } ?>
				      </select>
				    </div>				    
				    <div class="form-group">
				      <label for="clave" class="control-label">Clave</label>
				        <input class="form-control" name="clave" type="password" required>
				    </div>
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