<?php
// iniciamos sesión si aún no se ha iniciado
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require 'views/index.view.php';
require 'clases/ContrasenaInvalidaException.php';

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["nombre"])) {
    $nombre = $_POST["nombre"];
    $contrasenya = $_POST["contrasenya"];

    $hostDB = "localhost";
    $nombreDB = "dwes";
    $userDB = "root";
    $passDB = "";

    // creamos la conexión
    $dsn = "mysql:host=$hostDB;dbname=$nombreDB;";
    $pdo = new PDO($dsn, $userDB, $passDB);

    try {
        // buscamos al usuario en la tabla de cuentas
        $select = $pdo->prepare("SELECT * FROM cuentas WHERE usuario = :usuario");
        $select->bindParam(':usuario', $nombre);
        $select->execute();

        $resultados = $select->fetch(PDO::FETCH_ASSOC);

        // verificamos la contraseña
        if ($resultados && password_verify($contrasenya, $resultados["contrasenya"])) {
            $_SESSION["nombre"] = $nombre;
            $_SESSION["idusuario"] = $resultados["id"];

            header("Location: gestor.php");
            exit();
        } else {
            $_SESSION["error"] = "Nombre o contraseña inválida.";
            header("Location: index.php");
            exit();
        }
    } catch (PDOException $e) {
        $_SESSION["error"] = "Error al conectar con la base de datos: " . $e->getMessage();
        header("Location: index.php");
        exit();
    }
}
?>
