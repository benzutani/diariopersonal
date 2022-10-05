<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="icon" href="VISTA/modulo/img/favicon.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Diario</title>

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        
</head>

<body>
    
    
    <?php
        $rutasC = new rutasC();    
        $modulo = $rutasC->procesaRutasC();
        include $modulo.".php";
    ?>
    
    
    

   

</body>

<?php
require_once './VISTA/paginas/footer.php';
?>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/materialize/0.98.2/js/materialize.min.js"></script>
</html>
