<?php //  Controladores/rutasC.php
class rutasC {
    public function procesaRutasC(){
        if (isset($_GET['ruta'])){
            $ruta = $_GET['ruta'];
        }
        else
        {
            $ruta = 'index';
        }
        
        include_once 'MODELO/rutasM.php';
        $rutasM = new RutasM();
        $pagina = $rutasM->procesaRutasM($ruta);
        
        return $pagina;
    }
}
?>