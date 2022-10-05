<?php
$registrar = new usuarioC();
//$registrar->registrarUsuarioC();
$registrar->actualizarContraC();
?>
<br> 
<div class="container">
<h1>Actualizar contraseña</h1>

<form method="post" action="">
	nueva contraseña: <input type="password" placeholder="Clave" name="claveV" required>
	verifica contraseña nueva: <input type="password" placeholder="Clave" name="claveconfV" required>
	
	<input type="submit" value="Actualizar Contraseña">
	
</form>
</div>