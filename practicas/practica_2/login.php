<?php

session_start();  //abre o re abre una sesión de usuario


if (isset($_SESSION['autenticado']) == true)     //mismo codigo que cliente.php
{
	if($_SESSION['autenticado'] == true )
	{
		header('Location: '."servidor.php");
	}
	else
	{
		session_destroy();
		header('Location: '."cliente.php?error=3");
	}
}
else
{

	 if (isset($_POST['usuario']) && isset($_POST['passw'])) {
		
		if(autenticar( $_POST['usuario'], $_POST['passw'] ) == true )  //paso los parametros a la funcion de autenticar
		{
			header('Location: '."servidor.php");   //si se aprobo el ingreso, voy a la pagina servidor.php
		}
		else
		{
			session_destroy();						    //si falla el ingreso vy a cliente.php con un error;
			header('Location: '."cliente.php?error=2");
		}
	 }
	 else
	 {
		session_destroy();						    //si falla el ingreso va a cliente.php con un error;
		header('Location: '."cliente.php?error=3");
	 }
	 
}


function autenticar($user, $password)
{
	$usuarios = array('admin'=>'admin_pass', 'usuario'=>'usuario_pass');   //esta es mi lista forzada de usuarios puede estar en cualquier lugar o formato.
	
	if($usuarios[ $user ] === $password ) //verifico si el passwrod para el usuario recibido coincide con el que tengo guardado bajo el nombre proporcionado
	{
		//si esta el usuario y su password es correcto
		
		$_SESSION['autenticado'] = true;				//establezco una variable de sesion en true;
		$_SESSION['user'] = $_POST['usuario'];			//recuerdo el nombre del usuario
		return true;									//retorno true;
	}
	else
	{
		return false;   //si el usuario o el password no son correctos retorno false
	}
}
?>