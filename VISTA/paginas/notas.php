<?php
    include_once 'nav.php';
?>

<br><br>
<center>
    <h1>Mis notas</h1>
    <div class="container">
       
            <div class="row">
                
      <div class="row">          
          
<?php
               $diario = new diarioC();
               
               $diario->archivarDiarioC();
               $diario->favoritoDiarioC();
               $diario->normalDiarioC();
               $diario->eliminarDiarioC(1);
               $pagina = $diario->mostrarDiarioC();
                
                foreach($pagina as $key1 => $value){
                    if($value['COD_ESTADO_DIARIO']==1){
               ?>
          <form method="POST">
          <div class="col s4 m4">
      <div class="card">
        <div class="card-image">
          <img src="VISTA/paginas/imagenDiario/<?=$value['FOTO']?>">
          <a href="index.php?ruta=notas&cod_diarioFavorito=<?=$value['COD_DIARIO']?>" class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">thumb_up</i></a>
        </div>
          <span class="card-title"><?=$value['TITULO']?></span>
        <div class="card-content">
            <p><?=$value['CONTENIDO']?></p>
            <p><?=$value['FECHA_HORA']?></p>
        </div>
        <div class="card-action">
          <a href="index.php?ruta=editarNota&cod_diarioEditar=<?=$value['COD_DIARIO']?>">Editar</a>
          <a href="index.php?ruta=notas&cod_diarioArchivado=<?=$value['COD_DIARIO']?>">Archivar</a>
          <a href="index.php?ruta=notas&cod_diarioEliminar=<?=$value['COD_DIARIO']?>">Eliminar</a>
        </div>
      </div>
        
        
        
    </div>
          </form>
          <?php
                    }else{
                        ?>
          
          <form method="POST">
          <div class="col s4 m4">
      <div class="card">
        <div class="card-image">
          <img src="VISTA/paginas/imagenDiario/<?=$value['FOTO']?>">
          <a href="index.php?ruta=notas&cod_diarioNormal=<?=$value['COD_DIARIO']?>" class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">favorite</i></a>
        </div>
          <span class="card-title"><?=$value['TITULO']?></span>
        <div class="card-content">
            <p><?=$value['CONTENIDO']?></p>
            <p><?=$value['FECHA_HORA']?></p>
        </div>
        <div class="card-action">
          <a href="index.php?ruta=editarNota&cod_diarioEditar=<?=$value['COD_DIARIO']?>">Editar</a>
          <a href="index.php?ruta=notas&cod_diarioArchivado=<?=$value['COD_DIARIO']?>">Archivar</a>
          <a href="index.php?ruta=notas&cod_diarioEliminar=<?=$value['COD_DIARIO']?>">Eliminar</a>
        </div>
      </div>
        
        
        
    </div>
          </form>
          <?php
                    }
                }

               ?>
          
          
          
          
          
          
  </div>

    </form>
                
                
                
                
                
  </div>
      </div>
   
    </center>
<br><br>
