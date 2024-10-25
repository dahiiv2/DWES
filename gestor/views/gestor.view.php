<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/general.css"></link>
    <link rel="stylesheet" href="css/gestor.css"></link>
    <title>Document</title>
</head>
<body>
    <div id="encabezado">
        <h1>Gestor de Tareas</h1>
        <h1>Bienvenido, <span class="bienvenido"><?php echo $_SESSION["nombre"] ?></span><h1>

        <form action="cerrarSesion.php" method="post" id="cerrarSesion">
            <button type="submit" id="cerrarBoton" name="cerrar">Cerrar Sesion</button>
        </form>

        <form action="index.php" method="post" id="volverIndex">
            <button type="submit" id="indexBoton" name="cerrar">
            <img src="img/casa.png" alt="casa" id="casa">
            </button>
        </form>
    </div>

</body>
</html>