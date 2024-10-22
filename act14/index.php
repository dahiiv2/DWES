<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Login</h1>

    <form action="panelControl.php" method="post">
        <label for="nombre">Nombres:</label>
        <br> <br>
        <input type="text" id="nombre" name="nombre" required></input>
        <br> <br>
        <button type="submit">Login</button>
        <br> <br>
        <!-- esto lo he añadido porque al hacer tests si me volvia al inicio y no sabia el usuario no podia
         acceder, ya que se supone q en esta actividad no se puede poner si no has iniciado sesion-->
        <a href="CerrarSesion.php">Cerrar sesion (debug)</a>
    </form>
</body>
</html>