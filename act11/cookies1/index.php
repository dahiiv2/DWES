<?php
// miramos si se ha elegido un color y lo asignamos a $color, si no lo hay asignamos ninguno
$color = isset($_COOKIE["color_elegido"]) ? $_COOKIE['color_elegido'] : "ninguno";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Selección de colores (selección)</h1>

    <p>Se ha elegido el color: <?php echo $color?></p>

    <p>Cambio de color:</p>

    <ul>
        <!--vamos a color_elegido-php pero pasandole una variable por el url
        no se como hacerlo para que se guarde en $color sin usar JS-->
        <li><a href="color_elegido.php?color=red">Rojo</a></li>
        <li><a href="color_elegido.php?color=blue">Azul</a></li>
        <li><a href="color_elegido.php?color=green">Verde</a></li>
    </ul>

    <a href="color_elegido.php">Ir a otra página para comprobar la cookie</a>

</body>
</html>