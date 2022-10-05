<?php
    include_once 'nav.php';
?>
<br><br>
<center>
    <div class="container">
        <div class="row">
    <div class="col s12 m12">
      <div class="card">
        <div class="card-content">
          <span class="card-title">Bienvenido a tu perfil</span>
        </div>
        <div class="card-action">
            
            <div class="row">
                
                <div class="">
                    <img src="VISTA/paginas/imagenUsuario/<?=$_SESSION["FOTO"]?>" height="50%" width="50%">
        </div>
    <form method="POST" enctype="multipart/form-data" class="col s12">
      <div class="row">
        <div class="input-field col s6">
            <input value="<?=$_SESSION["NOMBRE"]?>" id="first_name" type="text" class="validate" readonly="">
          <label for="first_name">Nombres</label>
        </div>
        <div class="input-field col s6">
            <input value="<?=$_SESSION["APELLIDO"]?>" id="last_name" type="text" class="validate" readonly="">
          <label for="last_name">Apellidos</label>
        </div>
      </div>
                  
                  <div class="row">
        <div class="input-field col s6">
            <input value="<?=$_SESSION["CORREO"]?>" id="email" type="email" class="validate" readonly="">
          <label for="email">Email</label>
        </div>
                      
                      <div class="input-field col s6">
                          <input value="<?=$_SESSION["USER_NAME"]?>" id="usuario" type="email" class="validate" readonly="">
          <label for="usuario">Usuario</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
            <input value="No intentes robarme la contraseña" id="password1" type="password" class="validate" readonly="">
          <label for="password1">Contraseña</label>
        </div>
          
          
      </div>
        <div class="file-field input-field">
      <div class="btn">
        <span>Foto</span>
        <input name="fotoUsuarioP" type="file">
      </div>
      <div class="file-path-wrapper">
          <input class="file-path validate" type="text">
      </div>
    </div>
                  
                  <div class="row">
                      
                      <div class="input-field col s12">
                          <button class="btn waves-effect waves-light" name="subirFoto" type="submit">Subir foto
                      </button>
                    
        </div>
                      
                  </div>

    </form>
                
                <?php
                                 if(isset($_POST["subirFoto"])){
                                         $registrar = new usuarioC();
                                         if($registrar->actualizarFotoC()==0){
                                             echo '<br><h1>Ocurrio un error</h1>';
                                             ?>
                              <?php
                                 }else{
                                     echo '<br><h1>Foto actualizada. Para ver los cambios debe volver a iniciar sesión</h1>';
                                 ?>
                              <?php
                                 }
                                 }
                                
                                 ?>
  </div>
        </div>
      </div>
    </div>
  </div>
    </div>
    </center>
<br><br>
