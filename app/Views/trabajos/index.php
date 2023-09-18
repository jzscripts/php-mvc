<?php 
	$datos_clientes = $trabajos->listarClientes();
	$datos_empleados = $trabajos->listarEmpleados();
	$datos_departamentos = $trabajos->listarDepartamentos();
?>
<div class="box-principal">
	<div class="panel panel-default">
	  <div class="panel-heading">
	    <h3 class="panel-title">Buscar trabajos</h3>
	  </div>
	  <div class="panel-body">
        <div class="row">
          <div class="col-md-4"></div>
          <div class="col-md-4">
            <form role="form" enctype="multipart/form-data" method="POST" class="text-center" id="buscar">
              	<div class="form-group">
                	<input class="form-control" name="patente" placeholder="Patente" type="search" autofocus>
              	</div>
              	<div class="form-group">
              		<label class="control-label" for="fecha">Fecha de ingreso: </label>
                	<input class="form-control" name="fecha" value="" type="date">
              	</div>
				<div class="form-group">
					<select name="cliente" class="form-control selectpicker" data-live-search="true">
						<option value="0" selected>Buscar por Clientes</option>
						<?php while($row_cliente = mysqli_fetch_array($datos_clientes)){ ?>
							<option value="<?php echo $row_cliente['id_cliente']; ?>"><?php echo ucfirst($row_cliente['nombre']) . " " . ucfirst($row_cliente['apellido']); ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="form-group">
					<select name="empleado" class="form-control selectpicker" data-live-search="true">
						<option value="0" selected>Buscar por Empleados</option>
						<?php while($row_empleado = mysqli_fetch_array($datos_empleados)){ ?>
							<option value="<?php echo $row_empleado['id_empleado']; ?>"><?php echo ucfirst($row_empleado['nombre']) . " " . ucfirst($row_empleado['apellido']); ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="form-group">
					<select name="departamento" class="form-control selectpicker" data-live-search="true">
						<option value="0" selected>Buscar por Deparamentos</option>
						<?php while($row_departamento = mysqli_fetch_array($datos_departamentos)){ ?>
							<option value="<?php echo $row_departamento['id_departamento']; ?>"><?php echo ucfirst($row_departamento['departamento']); ?></option>
						<?php } ?>
					</select>
				</div>					
				<div class="form-group">
              		<button type="submit" class="btn btn-default btn-lg" id="accion_buscar"><i class="fa fa-2x fa-fw fa-search"></i></button>
              		<a href="<?php echo URL; ?>trabajos/agregar/" class="btn btn-default btn-lg" role="button"><i class="fa fa-2x fa-fw fa-plus"></i></a>
              	</div>
            </form>
          </div>
          <div class="col-md-4"></div>
        </div>
        <?php
        		if (mysqli_num_rows($datos)){?>
			        <div class="row">
			        	<div class="col-md-2"></div>
			        	<div class="col-md-8">
			        		<div class="table-responsive">
						    <table class="table table-striped table-hover">
							  <thead>
							    <tr>
							      <th>Patente</th>
							      <th>Empleado</th>
							      <th>Departamento</th>
							      <th class="text-center">Acción</th>
							    </tr>
							  </thead>
							  <tbody>
							  	<?php while($row = mysqli_fetch_array($datos)){ ?>
							  	<tr>
										<td><?php echo strtoupper($row['patente']); ?></td>
								    	<td><?php echo ucfirst($row['nombre']) . " " . ucfirst($row['apellido']); ?></td>
								    	<td><?php echo ucfirst($row['departamento']); ?></td>
								    	<td class="text-center">
								    		<a class="btn btn-default" href="<?php echo URL; ?>trabajos/ver/<?php echo $row['id_trabajo']; ?>"><i class="fa fa-2x fa-fw fa-eye"></i></a>
								    		<a class="btn btn-default" href="<?php echo URL; ?>trabajos/editar/<?php echo $row['id_trabajo']; ?>"><i class="fa fa-2x fa-fw fa-pencil"></i></a>
											<a class="btn btn-danger" href="<?php echo URL; ?>trabajos/eliminar/<?php echo $row['id_trabajo']; ?> " onclick="return confirm('Estás seguro que deseas eliminar el trabajo?');"><i class="fa fa-2x fa-fw fa-trash-o"></i></a>
								    	</td>
								</tr>
								<?php } ?>
							  </tbody>
							</table>
							</div>
			        	</div>
			        	<div class="col-md-2"></div>
			        </div>
        		<?php
        		}else{?>
			        <div class="row">
			        	<div class="col-md-2"></div>
			        	<div class="col-md-8">
			        		<h3 class="text-center text-danger"><i class="fa fa-2x fa-fw fa-warning"></i><br>No hay datos</h3>
			        	</div>
			        	<div class="col-md-2"></div>
			        </div><?php
        		}
        ?>
	  </div>
	</div>
</div>