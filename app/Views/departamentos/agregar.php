<div class="box-principal">
	<div class="panel panel-default">
	  <div class="panel-heading">
	    <h3 class="panel-title">Agregar un departamento</h3>
	  </div>
	  <div class="panel-body">
	  	<div class="row">
	  		<div class="col-md-1"></div>
	  		<div class="col-md-10">
	  			<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
				    <div class="form-group">
				      <label for="departamento" class="control-label">Departamento</label>
				        <input class="form-control" name="departamento" type="text" autofocus required>
				    </div>
					<div class="form-group">
						<label class="control-label" for="descripcion">Descripción</label>
						<textarea class="form-control" name="descripcion" required></textarea>
						<p class="help-block">Descripcion del nuevo departamento</p>
					</div>
				    <div class="form-group text-center">
				    	<a class="btn btn-default" href="<?php echo URL; ?>departamentos"><i class="fa fa-2x fa-fw fa-mail-reply-all"></i></a>
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