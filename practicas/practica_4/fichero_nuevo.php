<?php


$file = "archivo_binario.txt";

$fp = fopen($file, "w+");   //abrimos con permiso de lectura y escritura , si no existe se crea el archivo

if(file_exists($file))
{
    
      
    fwrite($fp, "Prueba de escritura - Cátedra programación 1\r\n"); //escribimos una línea en el archivo
    fwrite($fp, "UNL  - FICH - TUIG\r\n" );                          //escribimos otra línea más 
    
    echo "<h2><p>Texto Original<p></h2>";
    
    rewind($fp); //retrocedemos el cursor
    
    while(!feof($fp))
    {
        $fila = fgets($fp);   //recuperamos la fila
        if($fila !== false)     // si el retorno es nulo, finaliza
            echo "<p>".$fila."</p>";	//imprimimos la línea recuperada
    }
    
    rewind($fp); //retrocedemos el cursor del archivo al comienzo;
    
    fseek($fp,6); //movemos el cursor a una posición seleccionada
    
    fwrite($fp, " de cátedra  "); //reemplazamos un grupo de 13 caracteres;
    
    fflush($fp); // forzamos el guardado
    
    fseek($fp, 0); //retrocedemos con otro método
        
    
    echo "<h2><p>Texto modificado <p></h2>";
    while(!feof($fp))
    {
        $fila = fgets($fp);   //recuperamos la fila
        if($fila !== false)     // si el retorno es nulo, finaliza
            echo "<p>".$fila."</p>";	//imprimimos la línea recuperada
    }
}


?>