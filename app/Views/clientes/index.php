<div class="box-principal">
	<div class="panel panel-default">
	  <div class="panel-heading">
	    <h3 class="panel-title">Buscar clientes</h3>
	  </div>
	  <div class="panel-body">
        <div class="row">
          <div class="col-md-4"></div>
          <div class="col-md-4">
            <form role="form" enctype="multipart/form-data" method="POST" class="text-center" id="buscar">
              <div class="form-group has-feedback" id="buscador">                
                <input class="form-control" id="texto_buscar" name="texto_buscar" placeholder="Nombre, Apellido, DNI" type="search" autofocus>
              </div>
              <div class="form-group">
          		<button type="submit" class="btn btn-default btn-lg" id="accion_buscar"><i class="fa fa-2x fa-fw fa-search"></i></button>
          		<a href="<?php echo URL; ?>clientes/agregar/" class="btn btn-default btn-lg" role="button"><i class="fa fa-2x fa-fw fa-plus"></i></a>
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
							      <th>Nombre</th>
							      <th>Apellido</th>
							      <th>DNI</th>
							      <th class="text-center">Acción</th>
							    </tr>
							  </thead>
							  <tbody>
							  	<?php while($row = mysqli_fetch_array($datos)){ ?>
							  	<tr>
										<td><?php echo ucfirst($row['nombre']); ?></td>
								    	<td><?php echo ucfirst($row['apellido']); ?></td>
								    	<td><?php echo $row['dni']; ?></td>
								    	<td class="text-center">
								    		<a class="btn btn-default" href="<?php echo URL; ?>clientes/ver/<?php echo $row['id_cliente']; ?>"><i class="fa fa-2x fa-fw fa-eye"></i></a>
								    		<a class="btn btn-default" href="<?php echo URL; ?>clientes/editar/<?php echo $row['id_cliente']; ?>"><i class="fa fa-2x fa-fw fa-pencil"></i></a>
											<a class="btn btn-danger" href="<?php echo URL; ?>clientes/eliminar/<?php echo $row['id_cliente']; ?> " onclick="return confirm('Estás seguro que deseas eliminar el cliente?');"><i class="fa fa-2x fa-fw fa-trash-o"></i></a>
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