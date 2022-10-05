<br> <!-- Vistas/Modulos/ingreso.php -->
<div class="container">
<h1>Recuperar Contraseña</h1>

<form method="post" action="">
	<input type="email" placeholder="example@gmail.com" name="correoR" required>
	<input type="submit" value="Recuperar">
	
</form>
</div>

<?php

$registrar = new usuarioC();
$registrar->recuperarC();
//header('location:index.php?ruta=verifica');
?>