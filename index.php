<?php
    session_start();
    ob_start();
    require_once './CONTROLADOR/rutasC.php';
    require_once './CONTROLADOR/usuarioC.php';
    require_once './CONTROLADOR/diarioC.php';
    
    
    
    include './VISTA/plantilla.php';
    ob_end_flush();
?>