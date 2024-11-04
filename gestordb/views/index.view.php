<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/general.css"></link>
    <link rel="stylesheet" href="css/index.css"></link>
    <title>Gestor de Tareas</title>
</head>
<body>
    <div id="encabezado">
        <h1>Gestor de Tareas - Login</h1>
    </div>

        <!-- formulario para hacer login -->
        <form action="" method="post">
            <label for="nombre">Nombre: </label>
            <input type="text" name="nombre" id="nombre" required>

            <label for="contrasenya">Contraseña: </label>
            <input type="password" name="contrasenya" id="contrasenya" required>

            <p id="error">
                <?php
                    //si hay error lo imprimimos y borramos
                    if (isset($_SESSION["error"])) { 
                        echo $_SESSION["error"]; 
                        unset($_SESSION["error"]);
                    } 
                ?>
            </p>

            <input type="submit" value="Login" id="submit">
        </form>

        <form action="cerrarSesion.php" method="post">
            <button type="submit" id="cerrar" name="cerrar">Cerrar Sesion</button>
        </form>

    <div id="img">
        <img src="img/ies.png" alt="Logo IES La Mar" id="ies">
    </div>


</body>
</html>