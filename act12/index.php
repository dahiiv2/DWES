<!doctype html>
<html lang="es">
    <head>
    <meta charset="utf-8">
    <title> Desarrollo web con PHP</title>
    <meta name="description" content="PHP">
    <meta name="author" content="Daniel">
</head>
    <body>
    <h1>Tema 2: Actividad 12</h1>
    <?php

        include "sesion.php";

        //creamos sesión
        $sesion = new sesion("nombre", "Daniel");

        //mostramos el atributo (nombre)
        echo 'Nombre guardado en la sesión: ' . $sesion->getAttribute("nombre") . '<br>';

        //eliminamos el atributo
        $sesion->deleteAttribute("nombre");
        echo 'Nombre después de eliminarlo: ' . $sesion->getAttribute("nombre") . '<br>';

        // destruir la sesión
        $sesion2 = new sesion("contraseña", "123");
        $sesion2->destroySession();
        echo 'Contraseña: ' . $sesion->getAttribute("nombre") . '<br>';


         

    ?>
</body>
</html>