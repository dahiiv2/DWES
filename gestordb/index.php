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
    
        $hostDB = "localhost";
        $nombreDB = "dwes";
        $userDB = "root";
        $passDB = "";
    
        $dsn = "mysql:host=$hostDB;dbname=$nombreDB;";

        $pdo = new PDO($dsn, $userDB, $passDB);
    
        try {
            $pdo = new PDO($dsn, $userDB, $passDB);
    
            $select = $pdo->prepare("SELECT * FROM cuentas WHERE usuario = :usuario AND contrasenya = :contrasenya");
            $select->bindParam(':usuario', $nombre);
            $select->bindParam(':contrasenya', $contrasenya);

            $select->execute();
        
            $resultados = $select->fetch();
    
            if ($resultados) {
                $_SESSION["nombre"] = $nombre;
                header("Location: gestor.php");
                exit();

                $select = $pdo->prepare("SELECT id FROM cuentas WHERE usuario = :usuario");
                $select->bindParam(':usuario', $nombre);

                $select->execute();

                $_SESSION["idusuario"] = $select->fetch();

                
            } else {
                $_SESSION["error"] = "Nombre o contraseña inválida.";
                header("Location: index.php");
                exit();
            }
        } catch (PDOException $e) {
            $_SESSION["error"] = "Error al conectar con la base de datos: ". $e->getMessage();
            header("Location: index.php");
            exit();
        }
    }
?>

