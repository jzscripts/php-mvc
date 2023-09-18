<?php 
	$datos_2 = $empleados->listarDepartamentos();
?>
<div class="box-principal">
	<div class="panel panel-default">
	  <div class="panel-heading">
	    <h3 class="panel-title">Buscar empleados</h3>
	  </div>
	  <div class="panel-body">
        <div class="row">
          <div class="col-md-4"></div>
          <div class="col-md-4">
            <form role="form" enctype="multipart/form-data" method="POST" class="text-center" id="buscar">
				<div class="form-group">                
					<input class="form-control" id="texto_buscar" name="texto_buscar" placeholder="Nombre, Apellido, DNI" type="search" autofocus >
				</div>
				<div class="form-group">
					<select name="texto_buscar" class="form-control selectpicker" data-live-search="true">
						<option value="0" selected disabled>Departamento</option>
						<?php while($row_2 = mysqli_fetch_array($datos_2)){ ?>
						<option value="<?php echo $row_2['id_departamento']; ?>"><?php echo ucfirst($row_2['departamento']); ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="form-group">
              		<button type="submit" class="btn btn-default btn-lg" id="accion_buscar"><i class="fa fa-2x fa-fw fa-search"></i></button>
              		<a href="<?php echo URL; ?>empleados/agregar/" class="btn btn-default btn-lg" role="button"><i class="fa fa-2x fa-fw fa-plus"></i></a>
              	</div>
            </form>
          </div>
          <div class="col-md-4"></div>
        </div>
        <?php
        	if ($_POST){
        		if (mysqli_num_rows($datos)){?>
			        <div class="row">
			        	<div class="col-md-2"></div>
			        	<div class="col-md-8">
			        		<div class="table-responsive">
						    <table class="table table-striped table-hover">
							  <thead>
							    <tr>
							      <th>Empleado</th>
							      <th>Departamento</th>
							      <th class="text-center">Acción</th>
							    </tr>
							  </thead>
							  <tbody>
							  	<?php while($row = mysqli_fetch_array($datos)){ ?>
							  	<tr>
										<td><?php echo ucfirst($row['nombre']) . " " . ucfirst($row['apellido']); ?></td>
								    	<td><?php echo ucfirst($row['departamento']); ?></td>
								    	<td class="text-center">
								    		<a class="btn btn-default" href="<?php echo URL; ?>empleados/ver/<?php echo $row['id_empleado']; ?>"><i class="fa fa-2x fa-fw fa-eye"></i></a>
								    		<a class="btn btn-default" href="<?php echo URL; ?>empleados/editar/<?php echo $row['id_empleado']; ?>"><i class="fa fa-2x fa-fw fa-pencil"></i></a>
											<a class="btn btn-danger" href="<?php echo URL; ?>empleados/eliminar/<?php echo $row['id_empleado']; ?>" onclick="return confirm('Estás seguro que deseas eliminar el empleado?');"><i class="fa fa-2x fa-fw fa-trash-o"></i></a>
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
        	}
        ?>
	  </div>
	</div>
</div>