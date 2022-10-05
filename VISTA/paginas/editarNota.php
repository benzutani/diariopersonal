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
          <span class="card-title">Modificar nota</span>
        </div>
        <div class="card-action">
            
            <div class="row">
                
                <?php
                
                
                $diario = new diarioC();
                $pagina = $diario->listarNotaEditarC();
                foreach($pagina as $key1 => $value){
                ?>
                
                <form class="col s12" method="POST" enctype="multipart/form-data">
        
        <div class="">
            <img src="./VISTA/paginas/imagenDiario/<?=$value['FOTO']?>" height="50%" width="50%">
        </div>
                    <input hidden="" name="codigo" type='text' value="<?=$value['COD_DIARIO']?>"/>
        <input hidden="" name="fotoHidden" type='text' value="<?=$value['FOTO']?>"/>
        
      <div class="row">
        <div class="input-field col s12">
            <input name="titulo" value="<?=$value['TITULO']?>" id="first_name" type="text" class="validate" required="">
          <label for="first_name">Ingrese titulo</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <textarea name='contenido' id="textarea1" class="materialize-textarea"><?=$value['CONTENIDO']?></textarea>
          <label for="textarea1">Contenido</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
            <input name="fecha" value="<?=$value['FECHA_HORA']?>" placeholder="Fecha | Hora" id="fecha" type="datetime" onfocus="(this.type='datetime-local')" class="datepicker" required="">
        </div>
      </div>
      <div class="file-field input-field">
      <div class="btn">
        <span>Foto</span>
        <input name="foto" type="file">
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text">
      </div>
    </div>
        
        <button class="btn waves-effect waves-light" name="actualizar" type="submit">Actualizar
                      </button>
    </form>
                
                <?php
                }
                
                
                $registrar = new diarioC();
                $registrar->actualizarDiarioC();
                ?>
  </div>
        </div>
      </div>
    </div>
  </div>
    </div>
    </center>
<br><br>
