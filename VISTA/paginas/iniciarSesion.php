<center><div class="container">
    <div class="row">
        <div class="col s12 m12">
    <h2 class="header">INICIE SESION</h2>
    <div class="card">
      <div class="card-image"style="width: 300px;">
        <img src="https://img.freepik.com/vector-gratis/lindo-cuaderno-dibujos-animados-divertido-diario-turquesa_105738-1260.jpg?w=2000">
      </div>
      <div class="card-stacked">
        <div class="card-content">
          <form method="post">
                    
                    <div class="input-field">
                       <input id="first_name" type="text" class="form-control" placeholder="Usuario" autofocus="" name="UserUsuario" required="">
                       <label for="first_name">Usuario</label>
                    </div>
                    
                    <div class="input-field">
                       <input id="password" type="password" class="form-control" placeholder="Contraseña" name="PasswordUsuario" required="">
                       <label for="password">Contraseña</label>
                    </div>
                    
                      <button class="btn waves-effect waves-light" name="ingresarUsuario" type="submit">Iniciar sesión
                      </button>
                    
              <a href="index.php?ruta=registro" class="btn waves-effect waves-light red">Registrarse</a>

                </form>

                <a href='index.php?ruta=recuperarContraseña'>Olvidaste tu contraseña?</a>

                <?php
                    if(isset($_POST["ingresarUsuario"])){
                            $login = new usuarioC();
                            if($login->loginUsuarioC()==1){
                                header("location: index.php?ruta=notas");
                            }else{
                              echo "<h1>Datos incorrectos</h1>";
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

 











