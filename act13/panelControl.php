<?php
//abrimos la sesion
session_start();

//miramos lo siguiente:
//que sea un post
//que se haya pasado nombre
//y que no haya una sesion, asi si es la primera vez que entra asigna la variable a la sesion y pone sesionCreada a true
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["nombre"]) && !isset($_SESSION["nombre"])) { 
    $_SESSION["nombre"] = $_POST["nombre"]; 
    $sesionCreada = true;
    //si la sesion ya esta creada, miramos si coincide. si no lo hace, no permitimos acceso 
} elseif (isset($_SESSION["nombre"])) { 
    if ($_SESSION["nombre"] == $_POST["nombre"]) { 
        $sesionCreada = true; 
    } else { 
        $sesionCreada = false; 
    } 
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
        <h1>La sesion creada correctamente</h1>

        <p>Bienvenido! Has iniciado sesion como: <strong><?php echo htmlspecialchars($_SESSION["nombre"])?></strong></p>

        <a href="index.php">Ir a la página inicial</a>
        <br>
        <a href="CerrarSesion.php">Cerrar sesion</a>
        <!-- lo que se muestra si los nombres no coinciden -->
    <?php } else {?>
        <h1>No ha iniciado sesion</h1>

        <p>Acceso restringido, introduce el nombre correcto</p>

        <a href="index.php">Ir a la página inicial</a>
        <br>
        <a href="CerrarSesion.php">Cerrar sesion</a>
    <?php }?>
</body>
</html>