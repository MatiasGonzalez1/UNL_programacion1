<!DOCTYPE html>
<html>
<body>

<h1>Llamada POST</h1>


<h3>Formulario </h3>

<form  method="post" action="servidor.php" >
	
	<label for="nom">Nombre:</label> 
	<input id="nom" name="nombre" type="text" placeholder="Ingrese nombre" required> <br>
	<label for="apell">Apellido: </label>
	<input id="apell" name="apellido" type="text" placeholder="Ingrese apellido" required><br>
	<label for="nacim">Año de nacimiento:</label>
	<input id="nacim" name="anioNacimiento" type="date" required><br>
	
	<input name="oculto" type="hidden" value="llamada POST con Formulario">
	
	<input type="submit" >
</form>



</body>
</html>