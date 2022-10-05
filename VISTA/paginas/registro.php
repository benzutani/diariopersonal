<center><div class="container">
    <div class="row">
        <div class="col s12 m12">
    <h2 class="header">Ingrese los datos para su registro</h2>
    <div class="card">
      <div class="card-image " >
        <img src="https://img.freepik.com/vector-premium/agregar-icono-vector-concepto-plano-contacto-nueva-idea-registro-usuario-conjunto-ilustraciones-color-dibujos-animados-inscripcion-registrarse-crear-cuenta-registro-registrate-inicia-sesion-inscribete-elemento-diseno-grafico-aislado_106317-16118.jpg?w=2000" style="height: 200px; width: 200px;">
      </div>
      <div class="card-stacked">
        <div class="card-content">
          <div class="row">
              <form method="POST" class="col s12">
      <div class="row">
        <div class="input-field col s6">
            <input name="nombreUsuario" id="first_name" type="text" class="validate" required="">
          <label for="first_name">Nombres</label>
        </div>
        <div class="input-field col s6">
            <input name="apellidoUsuario" id="last_name" type="text" class="validate" required="">
          <label for="last_name">Apellidos</label>
        </div>
      </div>
                  
                  <div class="row">
        <div class="input-field col s6">
            <input name="emailUsuario" id="email" type="email" class="validate" required="">
          <label for="email">Email</label>
        </div>
                      
                      <div class="input-field col s6">
                          <input name="usuario" id="usuario" type="text" class="validate" required="">
          <label for="usuario">Usuario</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
            <input name="contrasenaUsuario1" id="password1" type="password" class="validate" required="">
          <label for="password1">Contraseña</label>
        </div>
          <div class="input-field col s6">
              <input name="contrasenaUsuario2" id="password2" type="password" class="validate" required="">
          <label for="password2">Confirmar contraseña</label>
        </div>
      </div>
                  
                  <div class="row">
                      
                      <div class="input-field col s12">
                          <button class="btn waves-effect waves-light" name="registroUsuarioV" type="submit">Registrarse
                      </button>
                    
              <a href="index.php?ruta=iniciarSesion" class="btn waves-effect waves-light red">Iniciar sesión</a>
        </div>
                      
                  </div>

    </form>
  </div>

                <?php
                if(isset($_POST["registroUsuarioV"])){
                        $registrar = new usuarioC();
                        if($registrar->registrarUsuarioC()==1){
                            echo "<h3>El usuario ha sido registrado correctamente</h3>";
                        }else{
                            echo "<h1>Error en el registro</h1> <h3>Recuerde que las contraseñas deben ser iguales</h3>";
                        }
                   } 
                ?>
        </div>
      </div>
    </div>
  </div>
        <div class="col s12 m5">
            <div class="card sticky-action">
               
            </div>
        </div>
    </div>
</div>
 </center>

 











