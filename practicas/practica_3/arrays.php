<?php

$nombre = "programación 1"; 
$array = array(1, 2, 3, "UNL", $nombre);  //creamos el array
 
//obtenemos el número de elementos
$longitud = count($array);  //funcion predefinida count
 
//Recorro todos los elementos
for($i=0; $i < $longitud; $i++)     //recorremos el array desde su posición 0 , 
{						          //hasta que la variable i sea estrictamente menor a la longitud 
								  //"o" $i <= $longitud-1 
      
		  //recuperamos el valor de cada elemento
		  echo $array[$i];
		  echo "<br>";  //luego de cada elemento ponemos un salto de línea
}

$equipo = array('portero'=>'Juan', 
                'defensa'=>'Jose', 
				'medio'=>'Martin', 
				'delantero'=>'Diego');  //definimos un array con nombres, cada valor tiene asociada una clave.
 
foreach($equipo as $posicion=>$jugador)  //utilizaremos la estructura de control foreach( unArray , clave => valor )
{
		echo "El " . $posicion . " es " . $jugador;  //imprimimos las posiciones y los jugadores de cada elemento.
		echo "<br>";
}

$equipo = array('portero'=>'Juan', 
                'defensa'=>'Jose', 
				'medio'=>'Martin', 
				'delantero'=>'Diego');  //definimos un array con nombres, cada valor tiene asociada una clave.
 
foreach($equipo as $posicion=>$jugador)  //utilizaremos la estructura de control foreach( unArray , clave => valor )
{
		echo "El " . $posicion . " es " . $jugador;  //imprimimos las posiciones y los jugadores de cada elemento.
		echo "<br>";
}


$equipo_futbol = array
 		(
 			'delantero' => array('Juan','Martin'),
 			'defensa' => array('Jose', 'Pedro', 'Mariano'),
 			'medio' => array('Diego','Julio'),
			'portero' =>array('Pepe')
 		);
 
 //recorremos el array principal con un foreach
 foreach($equipo_futbol as $posicion => $jugadores)
 {
 	echo "En este equipo juegan en la posición: ".$posicion.": ";
	echo "<br>";
	
	$elementos_en_la_posicion = count($jugadores);   //contamos los jugadores en la posición
	
	//recorremos cada array interno con un for para tener mayor control sobre la salida
 	for($indice=0; $indice < $elementos_en_la_posicion ; $indice++)
 	{
 		
		if ( $indice  == ($elementos_en_la_posicion - 2) )   // si es el anteultimo imprime un y al final del nombre
			echo $jugadores[$indice] ." y ";         
		elseif( $indice < ($elementos_en_la_posicion - 1) )  // si es el antepenúltimo y anteriores imprime una " ,"
			echo $jugadores[$indice] ." , ";
		else                                                 //solo para el último imprime solo el nombre
			echo $jugadores[$indice] ." ";
 	}
 	echo "<br>";
 }


 $autos = array (
  "Volvo"=>array(
			"Gama Alta"=>array('XC90'),
			"Gama Media"=>array('XC60','XC40')
			),
  "BMW"=>array(
			"Gama Alta"=> array('X6'),
			"Gama Media"=> array('X5','X3')
			),
  "Mercedes"=>array(
			"Gama Alta"=> array('Clase A'),
			"Gama Media"=> array('Clase C','Clase B','Clase G')
			),
  "Land Rover"=>array(
			"Gama Alta"=>array('Discovery'),
			"Gama Media"=>array('Freelander')
			)
);


foreach ($autos as $marca => $gamas) {
	echo "<h2><b>Marca ".$marca."</b></h2>";
  
	foreach ($gamas as $gama=>$modelos) {
		echo "<h3  style='margin-left:20px'><b>Gama ".$gama."</b></h3>";
		echo "<ul style='margin-left:50px'>";
		foreach($modelos as $unModelo )
		{
			echo "<li>".$unModelo."</li>";
		}
		echo "</ul>";
	}
}
?>