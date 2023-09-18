<div class="box-principal">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h1 class="panel-title"><b>Departamento de <?php echo ucfirst($datos['departamento']); ?></b></h1>
    </div>
    <div class="panel-body">
      <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
          <ul class="list-group text-center">
            <li class="list-group-item">
              <div class="row">
                <div class="col-md-6 text-right"><b>Departamento: </b></div>
                <div class="col-md-6 text-left"><?php echo ucfirst($datos['departamento']); ?></div>
              </div> 
            </li>
            <li class="list-group-item">
              <div class="row">
                <div class="col-md-6 text-right"><b>Descripcion: </b></div>
                <div class="col-md-6 text-left"><?php echo ucfirst($datos['descripcion']); ?></div>
              </div> 
            </li>
            <li class="list-group-item">
              <a class="btn btn-default btn-block" href="<?php echo URL; ?>departamentos"><i class="fa fa-2x fa-fw fa-mail-reply-all"></i></a>
            </li>                       
          </ul>
        </div>
        <div class="col-md-3"></div>     
    </div>
  </div>
</div>