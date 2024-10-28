<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    require 'views/index.view.php';
    require 'ContrasenaInvalidaException.php';
    require 'Usuario.php';
    
    //si venimos por un post y se ha escrito el nombre (esto ultimo es solo para que no de un warning)
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["nombre"])) {
        $nombre = $_POST["nombre"];
        $contrasenya = $_POST["contrasenya"];

        //si ya hay una sesion
        if (!isset($_SESSION["nombre"])) {
            
            $nombre = $_POST["nombre"];
            $contrasenya = $_POST["contrasenya"];
            //creamos el usuario en un try para hacer saltar nuestra excepcion si es necesario
            try {
                $usuario = new Usuario($nombre, $contrasenya);
                $_SESSION["nombre"] = $_POST["nombre"];
                $_SESSION["contrasenya"] = $_POST["contrasenya"];
                $_SESSION["usuario"] = serialize($usuario);
                $_SESSION["login"] = true;
                header("Location: gestor.php");
                exit();
            //muestra nuestras excepciones
            } catch (ContrasenaInvalidaException $e) {
                $_SESSION["error"] = $e->getMessage();
                header("Location: index.php");
                exit();
            }  
        
        //si ya hay sesion, verificamos que las credenciales sean correctas, si no, volvemos a index y mostramos error.
        } else {
            if (isset($_POST["nombre"]) && $_POST["contrasenya"]) {
                if ($_POST["nombre"] == $_SESSION["nombre"] && $_POST["contrasenya"] == $_SESSION["contrasenya"]) {
                    header("Location: gestor.php");
                    exit();
                } else {
                    $_SESSION["error"] = "Nombre o contraseña inválida.";
                    header("Location: index.php");
                    exit();
                }
            }
        }
    }
?>

