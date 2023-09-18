    

    <div class="container-fluid"> <!--Marcos aqui empieza el div de las secciones, como login, clientes, turnos, etc-->
    
        <div class="row"> 
              
              <div class="caja-login ">

                    <div class="form-group">

                          <form action="<?php echo URL; ?>empleados/iniciarSesion" method="post">
        
                                
                                <div class="text-center fuente">
                                  
                                      <label for="dni">Documento</label>
                                
                                </div>


                                <div class="text-center">
                              
                                      <input class="entrada" type="text" id="dni" name="dni" autofocus="true">
                                      
                                </div> 

                                <div class="text-center fuente">
                                  
                                      <label for="clave">Contraseña</label>
                                
                                </div>


                                <div class="text-center">
                              
                                      <input class="entrada" type="password" id="clave" name="clave" placeholder="•••••••••••••••••••••••••••••••••••" >
                                      
                                </div> 

                                <div class="text-center">
                                      <button class="hidden"></button>
                               
                                </div>
                                

                          
                          </form>

                    </div>
                
              </div> 
                   
        </div>

  </div>    