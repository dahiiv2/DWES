<?php
//abrimos la sesion y destruimos la informacion relacionada
session_start();

session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Has cerrado sesion correctamente</h1>

    <a href="login.php">Ir al Login</a>
</body>
</html>