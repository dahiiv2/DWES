<?php
    //titulo de la práctica
    echo "<h1>Tema 2: Actividad 6</h1>";

    //empezamos la sesion
    session_start();
    
    //inicializamos variables
    $nombre = "";
    $apellido = "";
    $email = "";
    $fecha = "";

    //si el array de alumnos existe en la sesión, lo recuperamos. si no, lo inicializamos con valores predeterminados
    if (!isset($_SESSION['alumnos'])) {
        $_SESSION['alumnos'] = [
            ['nombre' => 'Pedro', 'apellido' => 'García', 'email' => 'pedro@mail.com', 'fecha' => '10/09/2000'],
            ['nombre' => 'Carlos', 'apellido' => 'Ruiz', 'email' => 'carlos@mail.com', 'fecha' => '20/03/1999'],
            ['nombre' => 'Juan', 'apellido' => 'Perez', 'email' => 'juan@mail.com', 'fecha' => '18/06/2002']
        ];
    }

    //guardamos los alumnos de la sesion en el array
    $alumnos = $_SESSION['alumnos'];

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $nombre = trim(htmlspecialchars($_POST['nombre']));
        $apellido = trim(htmlspecialchars($_POST['apellido']));
        $email = trim(htmlspecialchars($_POST['email']));
        $fecha = trim(htmlspecialchars($_POST['fecha']));

        //variable para validar si introducir alumno en tabla
        $correcto = true;

        if(!empty($nombre) && !empty($email) && !empty($fecha)){
            echo "<p>Nombre: $nombre</p>";
            echo "<p>Apellido: $apellido</p>";

            if(filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                echo "<p>El email introducido no es válido";
                $correcto = false;
            }
            else {
                echo "<p>e-mail: $email</p>";
            }

            if (DateTime::createFromFormat('d/m/Y', $fecha) === false) {
                echo "<p>La fecha introducida no es una fecha válida";
                $correcto = false;
            }
            else {
                echo "<p>Fecha: $fecha</p>";
            }
            //si no ha fallado ninguna validación, se envia al array
            if ($correcto) {
                $alumno = [
                    'nombre' => $nombre,
                    'apellido' => $apellido,
                    'email' => $email,
                    'fecha' => $fecha
                ];
                //guardamos el array alumno en la sesión
                $_SESSION['alumnos'][] = $alumno;
            }
        }
        else
            echo "Alguno de los campos requeridos se ha quedado vacío";
    }
    // importante que el include vaya al final para que se le pase todo correctamente
    include "views/formulario.view.php";
?>