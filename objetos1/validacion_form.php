<div>
    <?php
        include './Agenda.php';

        if(isset($_POST['Enviar'])) {
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $dni = $_POST['dni'];
            $telefonos = $_POST['telefonos'];
            $domicilio = $_POST['domicilio'];

            $bandera_formulario = true;

            if(empty($nombre)) {
                echo "<p class='error'>Agrega tu Nombre! </p>";
                $bandera_formulario = false;
            } else {
                if (strlen($nombre) > 30) {
                    echo "<p class='error'>Tu nombre es muy largo!</p>";
                    $bandera_formulario = false;
                }
            }
            if(empty($apellido)) {
                echo "<p class='error'>Agrega tu apellido! </p>";
                $bandera_formulario = false;
            } else {
                if (strlen($apellido) > 30) {
                    echo "<p class='error'>Tu apellido es muy largo!</p>";
                    $bandera_formulario = false;
                }
            }
            if(empty($dni)) {
                echo "<p class='error'>Agrega tu DNI! </p>";
                $bandera_formulario = false;
            } elseif (strlen($dni) > 20) {
                echo "<p class='error'>El DNI es muy largo!</p>";
                $bandera_formulario = false;
                } else {
                    if (!is_numeric($dni)) {
                        echo "<p class='error'>El DNI debe ser solo números y sin espacios!</p>";
                        $bandera_formulario = false;
                    }
                }
            if (empty($telefonos)) {
                echo "<p class='error'>Agrega al menos un teléfono!</p>";
                $bandera_formulario = false;
            } else {
                $telefonos_repetidos = array_map('trim', explode(';', $telefonos)); 

                $numeros_repetidos = array();
                foreach ($telefonos_repetidos as $numero) {
                    $numero = trim($numero); 
                    
                    if (strlen($numero) > 20) {
                        echo "<p class='error'>El teléfono '$numero' es muy largo!</p>";
                        echo "<p class='error'>Si agregó más de un teléfono, separelos por un punto y coma ('';'')!</p>";
                        $bandera_formulario = false;
                    } elseif (!preg_match('/^\+\d+$/', $numero)) {
                        echo "<p class='error'>El teléfono '$numero' debe comenzar con un '+' y contener solo números!</p>";
                        $bandera_formulario = false;
                    } elseif (!is_numeric($numero)) {
                        echo "<p class='error'>El teléfono '$numero' debe ser un número sin guiones ni espacios!</p>";
                        $bandera_formulario = false;
                    } elseif (in_array($numero, $numeros_repetidos)) {
                        echo "<p class='error'>El teléfono '$numero' está repetido!</p>";
                        $bandera_formulario = false;
                    } else {
                        $numeros_repetidos[] = $numero; 
                        $numeros_repetidos = implode(';', $telefonos_repetidos);
                    }
                }
            }
            if(empty($domicilio)) {
                echo "<p class='error'>Agrega tu domicilio! </p>";
                $bandera_formulario = false;
            } else {
                if (strlen($domicilio) > 30) {
                    echo "<p class='error'>El domicilio es muy largo!</p>";
                    $bandera_formulario = false;
                }
            }

            if ($bandera_formulario) {
                $agenda = new Agenda();
                $contacto = array($dni,$nombre, $apellido, $domicilio, $numeros_repetidos);
                $resultado = $agenda->agregarContacto($contacto);

                if ($resultado === true) {
                    $agenda->guardarContactos();
                    header("Location: index.php?resultado=exito");
                    exit();
                } else {
                    header("Location: index.php?resultado=error");
                    exit();
                }
                
            }
        }
    ?>
</div>



