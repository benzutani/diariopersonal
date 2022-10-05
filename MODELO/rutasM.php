<?php //  Modelos/rutasM.php
class rutasM{
    public function procesaRutasM($ruta){
        if($ruta == "iniciarSesion" || 
            $ruta == 'registro' || 
            $ruta == 'reset_password'){
            
            $pagina = "VISTA/paginas/".$ruta;
        }
        else if(
            $ruta=='nuevaNota'||
            $ruta=='salir'||
            $ruta=='notas'||
            $ruta=='archivados'||
            $ruta=='perfil'||
            $ruta=='recuperarContraseña'||
            $ruta=='actualizarContraseña'||
            $ruta=='verifica'||
            $ruta=='iniciarSesion'||
            $ruta=='editarNota'){
            $pagina = "VISTA/paginas/".$ruta;
        }
        else{
            $pagina = "VISTA/paginas/iniciarSesion";
        }
        return $pagina;
    }
}
?>