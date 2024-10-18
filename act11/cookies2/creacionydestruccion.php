<?php
//miramos que sea post y que se haya pasado accion
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['accion'])) {
    $accion = $_POST["accion"];
    //dependiendo del value, es similar a un array asociativo, por ejemplo si le das a comprobar pasa 
    //name: accion, value: comprobar
    switch ($accion) {
        case "crear":
            //pasamos lo que esta en duracionCookie a int
            //aseguramos que sea 1-60
            $duracion = intval($_POST["duracionCookie"]);
            if ($duracion >= 1 && $duracion <= 60) {
                setcookie("cookie", "a", time() + $duracion);
                echo "Cookie creada, duración: " . $duracion;
            } else {
                echo "La duración tiene que estar entre 1 y 60 segundos.";
            }
            break;
        case "comprobar":
            //miramos que exista la cookie
            if (isset($_COOKIE["cookie"])) {
                echo "La cookie existe";
            } else {
                echo "La cookie no existe";
            }
            break;
        case "destruir":
            if (isset($_COOKIE["cookie"])) {
                //ponemos la cookie a un tiempo ya pasado para que se destruya
                setcookie("cookie", "", 1);
                echo "Cookie destruida";
            }
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
    <h1>Creación y destrucción de cookies</h1>

    <h1>Elija una opción</h1>

        <ul>
            <!-- para cada creamos un formulario donde el submit pasa como valor lo que queremos hacer
            para despues hacer un case y realizar lo que le hemos mandado -->
            <form action="" method="post">
            <li>Crear una cookie con una duración de <input type="number" name="duracionCookie">
            segundos (entre 1 y 60) <button type="submit" name="accion" value="crear">Crear</button></li>
            </form>

            <form action="" method="post">
            <li>Comprobar la cookie <button type="submit" name="accion" value="comprobar">Comprobar</button></li>
            </form>

            <form action="" method="post">
            <li>Destruir la cookie <button type="submit" name="accion" value="destruir">Destruir</button></li>
            </form>
        </ul>
    </form>
</body>
</html> 

