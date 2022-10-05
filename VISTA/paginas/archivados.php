<?php
    include_once 'nav.php';
?>

<br><br>
<center>
    <h1>Mis notas archivadas</h1>
    <div class="container">
       
            <div class="row">
                
      <div class="row">          
          
<?php
               $diario = new diarioC();            
               $diario->normalDiarioC();
               $diario->eliminarDiarioC(0);
               $pagina = $diario->mostrarDiarioArchivadoC();
                
                foreach($pagina as $key1 => $value){
               ?>
          <form method="POST">
          <div class="col s4 m4">
      <div class="card">
        <div class="card-image">
          <img src="VISTA/paginas/imagenDiario/<?=$value['FOTO']?>">
        </div>
          <span class="card-title"><?=$value['TITULO']?></span>
        <div class="card-content">
            <p><?=$value['CONTENIDO']?></p>
            <p><?=$value['FECHA_HORA']?></p>
        </div>
        <div class="card-action">
          <a href="index.php?ruta=notas&cod_diarioNormal=<?=$value['COD_DIARIO']?>">Desarchivar</a>
          <a href="index.php?ruta=notas&cod_diarioEliminar=<?=$value['COD_DIARIO']?>">Eliminar</a>
        </div>
      </div>
        
        
        
    </div>
          <?php
                }

               ?>
          
          
          
          
          
          
  </div>

    </form>
                
                
                
                
                
  </div>
      </div>
   
    </center>
<br><br>
