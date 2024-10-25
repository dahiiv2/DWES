<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    require 'views/index.view.php';
    
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (!isset($_SESSION["nombre"])) {
            $_SESSION["nombre"] = $_POST["nombre"];
            $_SESSION["contrasenya"] = $_POST["contrasenya"];
            header("Location: gestor.php");
            exit();
        } else {
            if (isset($_POST["nombre"]) && $_POST["contrasenya"]) {
                if ($_POST["nombre"] == $_SESSION["nombre"] && $_POST["contrasenya"] == $_SESSION["contrasenya"]) {
                    header("Location: gestor.php");
                } else {
                    $_SESSION["error"] = "Nombre o contraseña inválida.";
                }
            }
        }
    }
?>

