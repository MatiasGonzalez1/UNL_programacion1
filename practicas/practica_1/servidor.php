<html>
<body>

<h3>

<?php 

function edad($nacimientoString){
	
	$nacimientoObjeto = new DateTime($nacimientoString);   //uso del objeto DateTime se recibe YYYY-mm-dd
	$hoy = new DateTime();					//fecha de hoy
	$intervalo = $hoy->diff($nacimientoObjeto);		        //diferencia entre fechas (hoy - nacimiento)

	return $intervalo->y;                   //retorna el número de años de la diferencia.
}

?>

<?php  echo "<p>Hola " . $_POST['nombre'] . ", " . $_POST['apellido']."</p>";  ?> 
<?php  echo "<p>Tu edad es: " . edad($_POST['anioNacimiento']) ."</p>"; ?> 
</h3> 

<h4>Esto fue una: <?php  echo $_POST['oculto']; ?> </h4>

</body>
</html>