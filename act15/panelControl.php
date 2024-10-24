<?php
//abrimos la sesion
session_start();

//sin esto da error al unserializar
require "Usuario.php";

if (isset($_SESSION["usuario"])) {
    $usuario = unserialize($_SESSION["usuario"]);
}

if (!isset($_SESSION["votos1"])) {
    $_SESSION["votos1"] = 0;
}

if (!isset($_SESSION["votos2"])) {
    $_SESSION["votos2"] = 0;
}

$login = isset($_SESSION["login"]) && $_SESSION["login"] === true;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- lo que se muestra si se empieza sesion nueva o los nombres coinciden -->
    <?php if ($login) {?>
        <h1>Panel para Votar</h1>

        <p>Has iniciado sesion como: <strong><?php echo $usuario->getNombre()?></strong></p>

        <!-- formulario cuyos botones envian a ProcesaVotos para realizar la operacion sobre los votos-->
        <form action="procesaVotos.php" method="post">
            <button type="submit" name="accion" value="voto1" style="font-size: 60px; line-height: 50px; color: blue;">✔</button>
            <p><?php echo $_SESSION["votos1"]?></p>
            <br> <br>
            <button type="submit" name="accion" value="voto2" style="font-size: 60px; line-height: 50px; color: orange;">✔</button>
            <p><?php echo $_SESSION["votos2"]?></p>
            <br> <br>
            <button type="submit" name="accion" value="cero">Poner a cero</button>
            <br> <br>
        </form>
        <a href="index.php">Ir a la página inicial</a>
        <br>
        <a href="CerrarSesion.php">Cerrar sesion</a>
        <!-- lo que se muestra si los nombres no coinciden -->
    <?php } else {?>
        <h1>Panel para Votar</h1>

        <p>No ha iniciado sesion o está expirado</p>

        <h2>¡Acceso Denegado!</h2>

        <a href="index.php">Ir a Login</a>
    <?php }?>
</body>
</html>