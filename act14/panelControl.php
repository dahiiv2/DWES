<?php
//abrimos la sesion
session_start();

//miramos lo siguiente:
//que sea un post
//que se haya pasado nombre
//y que no haya una sesion, asi si es la primera vez que entra asigna la variable a la sesion y pone sesionCreada a true
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["nombre"])) {
    if (!isset($_SESSION["nombre"])) {
        $_SESSION["nombre"] = $_POST["nombre"];
        $sesionCreada = true;
    } else {
        $sesionCreada = $_SESSION["nombre"] == $_POST["nombre"];
    }
} elseif (isset($_SESSION["nombre"])) {
    $sesionCreada = true;
} else {
    $sesionCreada = false;
}

if (!isset($_SESSION["votos1"])) {
    $_SESSION["votos1"] = 0;
}

if (!isset($_SESSION["votos2"])) {
    $_SESSION["votos2"] = 0;
}

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
    <?php if ($sesionCreada) {?>
        <h1>Panel para Votar</h1>

        <p>Has iniciado sesion como: <strong><?php echo htmlspecialchars($_SESSION["nombre"])?></strong></p>

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