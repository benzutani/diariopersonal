<br> 
<div class="container">
<h1>Recuperar Contraseña</h1>

<form method="post" action="">
	verifica el token: <input type="text" placeholder="pegue su token" name="verificaR" required>
	<input type="submit" value="Verifica">
</form>
</div>

<?php

$registrar = new usuarioC();
$registrar->verificaC();

?>