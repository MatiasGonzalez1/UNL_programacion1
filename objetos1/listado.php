<?php

include './Agenda.php';


$agenda = new Agenda();

$contactos = $agenda->listaDeContactos();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TPN2</title>
    <link rel="stylesheet" href="CSS/estilos.css">
    <link rel="stylesheet" href="CSS/estilos_contacto.css">
</head>
<body>
    <?php include('Templates/header.html'); ?>
    <main>
        <section class="contenedor_tabla_datos">
            <table>
                <thead>
                    <tr>
                        <th>nombre</th>
                        <th>apellido</th>
                        <th>dni</th>
                        <th>dirección</th>
                        <th>teléfonos</th>
                    </tr>
                </thead>
                <?php foreach ($contactos as $contacto) : ?>
                <tbody>
                    <tr>
                        <td><?php echo $contacto->getNombre(); ?></td>
                        <td><?php echo $contacto->getApellido(); ?></td>
                        <td><?php echo $contacto->getDni(); ?></td>
                        <td><?php echo $contacto->getDomicilio(); ?></td>
                        <td>
                            <?php foreach ($contacto->getTelefonos() as $telefono) : ?>
                                <p><?php echo $telefono; ?></p>
                            <?php endforeach; ?>
                        </td>
                    </tr>
                </tbody>
                <?php endforeach; ?>
            </table>
        </section>
    </main>
    <?php
        include('Templates/footer.html');
    ?>
</body>
</html>
