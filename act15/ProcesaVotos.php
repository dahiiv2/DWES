<?php
session_start();

if (!isset($_SESSION["nombre"])) {
    header("Location: index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    switch ($_POST["accion"]) {
        case 'voto1':
            $_SESSION["votos1"] += 1;
            break;
        case 'voto2':
            $_SESSION["votos2"] += 1;
            break;
        case 'cero':
            $_SESSION["votos1"] = 0;
            $_SESSION["votos2"] = 0;
            break;
    }
}

header("Location: panelControl.php");
exit();
?>