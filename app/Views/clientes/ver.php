<div class="box-principal">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h1 class="panel-title"><b>Perfil de <?php echo ucfirst($datos['nombre'])." ".ucfirst($datos['apellido']); ?></b></h1>
    </div>
    <div class="panel-body">
      <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
          <ul class="list-group text-center">
            <li class="list-group-item">
              <div class="row">
                <div class="col-md-6 text-right"><b>DNI: </b></div>
                <div class="col-md-6 text-left"><?php echo $datos['dni']; ?></div>
              </div>              
            </li>
            <li class="list-group-item">
              <div class="row">
                <div class="col-md-6 text-right"><b>Domicilio: </b></div>
                <div class="col-md-6 text-left"><?php echo $datos['domicilio']; ?></div>
              </div>
            </li>
            <li class="list-group-item">
              <div class="row">
                <div class="col-md-6 text-right"><b>Telefono: </b></div>
                <div class="col-md-6 text-left"><?php echo $datos['telefono']; ?></div>
              </div>
            </li>
            <li class="list-group-item">
              <div class="row">
                <div class="col-md-6 text-right"><b>Mail: </b></div>
                <div class="col-md-6 text-left"><?php echo $datos['mail']; ?></div>
              </div>
            </li>     
            <li class="list-group-item">
              <a class="btn btn-default btn-block" href="<?php echo URL; ?>clientes"><i class="fa fa-2x fa-fw fa-mail-reply-all"></i></a>
            </li>                       
          </ul>
        </div>
        <div class="col-md-3">
      </div>     
    </div>
  </div>
</div>