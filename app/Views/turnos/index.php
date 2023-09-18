<?php
//	$datos_turno = $turnos->ver(54);
	$datos_vehiculos = $turnos->listarVehiculos();
	$datos_vehiculos_editar =  $turnos->listarVehiculos();
?>
<div class="box-principal">
	<div class="panel panel-default">
	  <div class="panel-heading">
	    <h3 class="panel-title">Calendario de turnos</h3>
	  </div>
	  <div class="panel-body">
	  	<div class="row">
	  		<div class="col-md-12">
				<div id="turnos" class="col-centered"></div>				
				<script>
					$(document).ready(function() {
						$('#turnos').fullCalendar({
										header: {
											left: 'prev,next today',
											center: 'title',
											right: 'month,agendaWeek,agendaDay'
										},
										events: "<?php echo URL; ?>/Controllers/eventosController/events.php",
										selectable: true,
										editable: true,
										select:  function(start, end) {
													endtime = moment(end, 'DD.MM.YYYY').format('YYYY-MM-DD[T]HH:mm:ss');
													starttime = moment(start, 'DD.MM.YYYY').format('YYYY-MM-DD[T]HH:mm:ss');
													$('#agregar #end').val(endtime);
													$('#agregar #start').val(starttime);
													$('#agregar').modal();
										},
										eventClick:  function(event, start, end) {
													endtime = event.end.format();
													starttime = event.start.format();
													$('#editar #cliente').val(event.title);
													$('#editar #descripcion').val(event.descripcion);
													$('#editar #id_turno').val(event.id);
													$('#editar #id_vehiculo').val(event.id_vehiculo);
													$('#editar #end').val(endtime);
													$('#editar #start').val(starttime);
													$('#editar').modal();
										}
									});
							});				    
				</script>			    
	  		</div>
	  	</div>	  	
	  </div>
	</div>
<div id="agregar" class="modal fade">
<div class="modal-dialog" style="top: 20%;">
    <div class="modal-content">
    	<form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
	        <div class="modal-header">
	            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> <span class="sr-only">cerrar</span></button>
	            <h4 id="tituloModal" class="modal-title">Agregar turno</h4>
	        </div>
	        <div id="contenidoModal" class="modal-body"> 
				<div class="form-group">
					<label for="id_vehiculo" class="col-sm-2 control-label">Vehiculo</label>
					<div class="col-sm-10">
				      <select name="id_vehiculo" class="form-control selectpicker" data-live-search="true">
				      		<option value="0" selected disabled>Seleccione un vehiculo</option>
				      	<?php while($row = mysqli_fetch_array($datos_vehiculos)){ ?>
				      		<option value="<?php echo $row['id_vehiculo']; ?>"><?php echo strtoupper($row['patente']); ?></option>
				      	<?php } ?>
				      </select>
					</div>
				</div>

				<div class="form-group">
					<label for="descripcion" class="col-sm-2 control-label">Detalle</label>
					<div class="col-sm-10">
						<textarea class="form-control" name="descripcion" rows="8" id="descripcion" required></textarea>
					</div>
				</div>

				<div class="form-group">
					<label for="start" class="col-sm-2 control-label">Inicio</label>
					<div class="col-sm-10">
						<input type="datetime-local" name="start" class="form-control" id="start">
					</div>
				</div>

				<div class="form-group">
					<label for="end" class="col-sm-2 control-label">Fin</label>
					<div class="col-sm-10">
						<input type="datetime-local" name="end" class="form-control" id="end">
					</div>
				</div>
	        </div>
			<div class="modal-footer">
					<button type="submit" class="btn btn-block btn-primary"><i class="fa fa-2x fa-fw fa-save"></i></button>
			</div>
		</form>

    </div>
</div>
</div>
<div id="editar" class="modal fade">
<div class="modal-dialog" style="top: 20%;">
    <div class="modal-content">
    	<form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
	        <div class="modal-header">
	            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> <span class="sr-only">cerrar</span></button>
	            <h4 id="tituloModal" class="modal-title">Editar turno</h4>
	        </div>
	        <div id="contenidoModal" class="modal-body"> 
				<div class="form-group">
					<label for="cliente" class="col-sm-2 control-label">Cliente</label>
					<div class="col-sm-10">
				      <input class="form-control" name="cliente" type="text" id="cliente" readonly >
					</div>
				</div>

				<div class="form-group">
					<label for="descripcion" class="col-sm-2 control-label">Detalle</label>
					<div class="col-sm-10">
						<textarea class="form-control" name="descripcion" rows="8" id="descripcion" required></textarea>
					</div>
				</div>

				<div class="form-group">
					<label for="start" class="col-sm-2 control-label">Inicio</label>
					<div class="col-sm-10">
						<input type="datetime-local" name="start" class="form-control" id="start">
					</div>
				</div>

				<div class="form-group">
					<label for="end" class="col-sm-2 control-label">Fin</label>
					<div class="col-sm-10">
						<input type="datetime-local" name="end" class="form-control" id="end">
					</div>
				</div>
	        </div>
			<div class="modal-footer">
					<input type="text" name="id_turno" class="hidden" id="id_turno">
					<input type="text" name="id_vehiculo" class="hidden" id="id_vehiculo">
				<div class="col-sm-12">
					<button type="submit" class="btn btn-block btn-primary"><i class="fa fa-2x fa-fw fa-save"></i></button>
				</div>
			</div>
		</form>
					<form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
					<div class="modal-footer">
						<input type="text" name="id_turno" class="hidden" id="id_turno">
						<input type="text" name="borrado" class="hidden" id="borrado" value="1">
						<div class="col-sm-12">
							<button type="submit" class="btn btn-block btn-danger"><i class="fa fa-2x fa-fw fa-trash-o"></i></button>
						</div>
					</div>
					</form>		
    </div>
</div>
</div>





</div>