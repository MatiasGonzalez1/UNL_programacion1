<?php

session_start(); //inicio o recupero una sesión del usuario

if (isset($_SESSION['autenticado']) == true) //si existe la variable autenticado y está en true
{
	if ($_SESSION['autenticado'] == true) //si el valor es = true
	{
		header('Location: ' . "servidor.php"); //retornamos servidor.php
	} else //si el valor de la variable es false, no estamos logueados, retornamos a cliente.php con un error
	{
		session_destroy();
		header('Location: ' . "cliente.php?error=3"); //destruimos cualquier rastro de sesión y saltamos a cliente.php
	}
}
?>

<!DOCTYPE html>

<html>

<head>
</head>

<body>

	<div id="id01" class="modal">

		<form class="" action="login.php" method="post">


			<div class="container">

				<label for="uname"><b>Usuario </b></label>
				<input id="uname" type="text" placeholder="Ingrese usuario" name="usuario" required> <br>

				<label for="psw"><b>Contraseña </b></label>
				<input id="psw" type="password" placeholder="Ingrese contraseña" name="passw" required>

				<?php
				if (isset($_GET['error']) == true) //si existe $_GET['error'], controlo según su valor
				{
					if ($_GET['error'] == 2) //error de parametros incorrectos
					{
						echo "<p>Error de autenticación</p>";
					} elseif ($_GET['error'] == 3) //error de sesión no iniciada
					{
						echo "<p>¡Debe iniciar sesión!</p>";
					} else
						echo "<p></p>";

				}

				?>
				<button type="submit">Ingresar</button> 
				<!-- boton de enviar -->

			</div>


		</form>

		<p>disponibles: </p>
		<p>usuario => usuario_pass </p>
		<p>admin => admin_pass</p>


</body>

</html>