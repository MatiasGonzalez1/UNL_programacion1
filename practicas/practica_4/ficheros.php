<?php

$file = "listado.csv";

if(file_exists($file))
{
		
	$fp = fopen($file, "r");   //abrimos con permiso de lectura

	echo "<h2><p>Listado<p></h2>";
	

	while(!feof($fp))
	{
            $fila = fgetcsv($fp);   //recuperamos la fila
            if($fila !== false)     // si el retorno es nulo, finaliza
                    echo "<p>".$fila[1]." ,".$fila[2]."</p>";	//imprimimos la línea recuperada
	}

	fclose($fp);
}


if(file_exists($file))
{
		
	$fp = fopen($file, "a+");  //abrimos con permiso de lectura y escritura pero lo hace al final del archivo

   if($fp){
		
				
	$fila_nueva = array("5","Domingo,Zincke","dzincke1c@meetup.com","43 Bobwhite Road","Université du Québec à Chicoutimi");
		
	fputcsv($fp,$fila_nueva);
	
	fclose($fp);
		
				
	echo "<h2><p>Listado<p></h2>";
		
	$fp = fopen($file, "r");
			
	while(!feof($fp))
	{
	  $fila = fgetcsv($fp);
          if($fila !== false)
              echo "<p>".$fila[1]." ,".$fila[2]."</p>";
	}

 	fclose($fp);
   }
}

?>