<?php
// miramos si se ha pasado un color a través del GET y lo guardamos en una cookie para que muestre al volver
if (isset($_GET["color"])) {
    $color = $_GET['color'];
    setcookie("color_elegido", $color, time() + 3600);
} else {
    // si no se ha pasado un color mediante get, miramos si hay cookie y si no asignamos a ninguno
    $color = isset($_COOKIE["color_elegido"]) ? $_COOKIE["color_elegido"] : "ninguno";
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
    <h1 style="color: <?php echo $color ?>">Selección de colores (comprobación)</h1>

    <p style="color: <?php echo $color ?>">Se ha elegido el color: <?php echo $color?></p>

    <a href="index.php" style="color: <?php echo $color ?>">Volver a la selección de color</a>

    
</body>
</html>