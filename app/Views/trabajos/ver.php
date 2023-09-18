<div class="box-principal">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h1 class="panel-title"><b>Fecha del trabajo: </b><?php echo strtoupper($datos['ingreso']); ?></h1>
    </div>
    <div class="panel-body">
      <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
          <ul class="list-group text-center">
          <div id="imprimirArea">
            <li class="list-group-item">
              <div class="row">
                <div class="col-sm-6 text-left"><b>Cliente</b></div>
                <div class="col-sm-6 text-center"><?php echo ucfirst($datos['nombreC']) . " " . ucfirst($datos['apellidoC']); ?></div>
              </div>
            </li>          
            <li class="list-group-item">
              <div class="row">
                <div class="col-sm-6 text-left"><b>Modelo del vehiculo</b></div>
                <div class="col-sm-6 text-center"><?php echo ucfirst($datos['modelo']) ." (" . strtoupper($datos['patente']) . ")"; ?></div>
              </div>              
            </li>
            <li class="list-group-item">
              <div class="row">
                <div class="col-sm-6 text-left"><b>Empleado a cargo</b></div>
                <div class="col-sm-6 text-center"><?php echo ucfirst($datos['nombreE']) . " " . ucfirst($datos['apellidoE']); ?></div>
              </div>
            </li>
            <li class="list-group-item">
              <div class="row">
                <div class="col-sm-6 text-left"><b>Fecha aproximada de entrega</b></div>
                <div class="col-sm-6 text-center"><?php echo $datos['egreso']; ?></div>
              </div>
            </li>
            <li class="list-group-item">
              <div class="row">
                <div class="col-sm-6 text-left"><b>Estado del trabajo</b></div>
                <div class="col-sm-6 text-center"><?php if (strtolower($datos['estado'])=='ini'){echo '<strong class="text-success">En proceso</strong>';}else{echo '<strong class="text-info">Finalizado</strong>';} ?></div>
              </div>
            </li>
            <li class="list-group-item">
              <div class="row">
                <div class="col-sm-6 text-left"><b>Departamento actual del vehiculo</b></div>
                <div class="col-sm-6 text-center"><?php echo ucfirst($datos['departamento']); ?></div>
              </div>
            </li>            
            <li class="list-group-item">
              <div class="row">
                <div class="col-sm-12 text-center"><b>Detalles del trabajo realizado</b></div>
              </div>
              <div class="row">
                <br><div class="col-sm-12 text-center"><?php echo $datos['detalleT'];?></div>
              </div>
            </li>
          </div>  
            <li class="list-group-item">
              <a class="btn btn-default btn-block" href="<?php echo URL; ?>trabajos"><i class="fa fa-2x fa-fw fa-mail-reply-all"></i></a>
              <a class="btn btn-default btn-block" href="javascript:imprSelec('imprimirArea')" id="imprime"><i class="fa fa-2x fa-fw fa-print"></i></a>
            </li>                       
          </ul>
        </div>
        <div class="col-md-3"></div>
        </div>
    </div>
  </div>
</div>

<script language="Javascript">
  function imprSelec(nombre) {
    var ficha = document.getElementById(nombre);
    var ventimp = window.open(' ', 'popimpr');
    ventimp.document.write( ficha.innerHTML );
    ventimp.document.close();
    ventimp.print( );
    ventimp.close();
  }
  </script>