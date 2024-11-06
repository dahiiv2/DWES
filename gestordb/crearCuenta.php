<?php
session_start();
require "clases/ContrasenaInvalidaException.php";

$hostDB = "localhost";
$nombreDB = "dwes";
$userDB = "root";
$passDB = "";

$dsn = "mysql:host=$hostDB;dbname=$nombreDB;";
$pdo = new PDO($dsn, $userDB, $passDB);

function validarContrasenya($contrasenya) {
    if (strlen($contrasenya) < 6) {
        throw new ContrasenaInvalidaException("La contraseña debe tener al menos 6 caracteres.");
    }
    if (strlen($contrasenya) > 15) {
        throw new ContrasenaInvalidaException("La contraseña debe tener menos de 16 caracteres.");
    }
    if (!preg_match('`[A-Z]`', $contrasenya)) {
        throw new ContrasenaInvalidaException("La contraseña debe tener al menos una letra mayúscula.");
    }
    if (!preg_match('`[a-z]`', $contrasenya)) {
        throw new ContrasenaInvalidaException("La contraseña debe tener al menos una letra minúscula.");
    }
    if (!preg_match('`[0-9]`', $contrasenya)) {
        throw new ContrasenaInvalidaException("La contraseña debe tener al menos un número.");
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    try {
        $nombre = $_POST["nuevo_nombre"];
        $contrasenya = $_POST["nueva_contrasenya"];

        validarContrasenya($contrasenya);

        $select = $pdo->prepare("SELECT COUNT(*) FROM cuentas WHERE usuario = :usuario");
        $select->bindParam(":usuario", $nombre);
        $select->execute();
        $existeUsuario = $select->fetchColumn() > 0;

        if ($existeUsuario) {
            throw new Exception("El nombre de usuario ya está en uso.");
        }

        $contraHash = password_hash($contrasenya, PASSWORD_BCRYPT);

        $select = $pdo->prepare("INSERT INTO cuentas (usuario, contrasenya) VALUES (:usuario, :contrasenya)");
        $select->bindParam(":usuario", $nombre);
        $select->bindParam(":contrasenya", $contraHash);

        $select->execute();

        $_SESSION["error"] = "Cuenta creada exitosamente. Por favor, inicie sesión.";
        header("Location: index.php");
        exit();

    } catch (ContrasenaInvalidaException $e) {
        $_SESSION["error"] = $e->getMessage();
        header("Location: index.php");
        exit();
    } catch (Exception $e) {
        $_SESSION["error"] = $e->getMessage();
        header("Location: index.php");
        exit();
    }
}
?>
