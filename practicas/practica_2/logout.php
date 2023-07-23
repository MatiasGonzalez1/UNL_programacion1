<?php

//recupera la sesion
session_start();
 
// libera todas las variables
session_unset();
 
// Destruye la sesión.
session_destroy();
header('Location: '."cliente.php");  //vuelve al login.

?>