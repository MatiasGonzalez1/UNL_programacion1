<?php

include './Agenda.php';


$agenda = new Agenda();    //creamos una instancia de agenda


echo "Usamos un metodo interno para buscar un contacto<br><br>";
echo $agenda->getContactoPorDNI('28859353')->ToString() . "<br><br>";

echo "Agregamos un contacto nuevo<br><br>";
$contactoNuevo = array("28834353","Pedro","Martinez","Pedro Centeno 100","+5493278669889;+5493422897823");

echo "Si Vemos que el contacto ya existe , probemos cambiar el DNI para ver qeu sucede <br><br>";

echo "Resultado: ". $agenda->agregarContacto($contactoNuevo) ."<br><br>";

echo "Usamos otro metodo para mostrar una lista<br><br>";

echo "<ol>";
foreach ($agenda->listaDeContactos() as $unContacto)
{
    echo "<li>".$unContacto->ToString();
       
}
echo "</ol>";

echo "Guardamos la agenda en un archivo<br><br>";
echo "Resultado:". $agenda->guardarContactos();