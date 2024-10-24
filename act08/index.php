<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title> Desarrollo web con PHP</title>
    <meta name="description" content="PHP">
    <meta name="author" content="Daniel">
</head>
<body>
    <h1>Tema 2: Actividad 8</h1>
    <?php
    include 'Persona.php';
    //creamos la persona mediante el constructor de la clase Persona
    $persona = new Persona("Daniel", "Mellera", 23, 10822696);
    //imprimimos info mediante los metodos creados en Persona
    echo "Nombre: " . $persona->getNombre() . "<br>";
    echo "Apellido: " . $persona->getApellidos() . "<br>";
    echo "Edad: " . $persona->getEdad() . "<br>";
    echo "DNI: " . $persona->getDni() . "<br>";
    echo "Es mayor de edad: " . ($persona->mayorEdad() ? "true" : "false") . "<br>";
    echo "Nombre completo: " . $persona->nombreCompleto() . "<br>";
    echo "DNI completo: " . $persona->identificacionCompleta() . "<br>";
    ?>
</body>
</html> 