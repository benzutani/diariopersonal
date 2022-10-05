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
          <span class="card-title">Agregue una nueva nota</span>
        </div>
        <div class="card-action">
            
            <div class="row">
                <form method="POST" enctype="multipart/form-data" class="col s12" >
      <div class="row">
        <div class="input-field col s12">
            <input name="titulo" id="first_name" type="text" class="validate" required="">
          <label for="first_name">Ingrese titulo</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
            <textarea name="contenido" id="textarea1" class="materialize-textarea" required=""></textarea>
          <label for="textarea1">Contenido</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
            <input name="fecha" placeholder="Fecha | Hora" id="fecha" type="datetime" onfocus="(this.type='datetime-local')" class="datepicker" required="">
        </div>
      </div>
      <div class="file-field input-field">
      <div class="btn">
        <span>Foto</span>
        <input name="foto" type="file" required="">
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text">
      </div>
    </div>
        
        <button class="btn waves-effect waves-light" name="registrar" type="submit">Registrar
                      </button>
    </form>
                
                <?php
                if(isset($_POST["registrar"])){
                        $registrar = new diarioC();
                        if($registrar->registrarDiarioC()==1){
                            echo "<h3>La nota se ha registrado correctamente..</h3>";
                        }else{
                            echo "<h3>Hay un error en el registro..</h3>";
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
