<?php

session_start();  //abre o re abre una sesión de usuario


if (isset($_SESSION['autenticado']) == true) { // si está autenticado se configura según el usuario
	
	if($_SESSION['autenticado'] == true )
	{
		switch ($_SESSION['user'])
		{	
			case "admin":
				$perfil = "Administrador";
			break;
			case "usuario":
				$perfil = "Usuario";
			break;
		}
	}
	else
	{
		session_destroy();
		header('Location: '."cliente.php?error=3");
	}
	
}
else	//si no está autenticado destruye sesiones, y vuelve a login
{
	session_destroy();
	header('Location: '."cliente.php?error=3");
		
}
?>

<!DOCTYPE html>


<html>
<body>

<h3>

<?php  echo "<p>Hola " . $_SESSION['user'] ."</p>";  ?> 
<?php  echo "<p>Tu perfil es: " . $perfil."</p>"; ?> 



</h3> 


sesion count: <?php 
if (isset($_SESSION['autenticado']) == true) 
{
	echo $_SESSION['autenticado']; 
	echo "<br>"; 
	echo "ID de sesion: ". session_id() . "  -  Estado:" .session_status();
	echo "<br>";
	echo "Nombre de sesion: ". session_name() ;
}

?>

<p><a href="logout.php">Salir</a></p>
</body>
</html>