<?php
session_start();

require "clases/ManagerTareas.php";

if (!isset($_SESSION["idusuario"])) {
    header("Location: index.php");
    exit();
}

$hostDB = "localhost";
$nombreDB = "dwes";
$userDB = "root";
$passDB = "";

$dsn = "mysql:host=$hostDB;dbname=$nombreDB;";
try {
    $pdo = new PDO($dsn, $userDB, $passDB);
    $gestor = new ManagerTareas($pdo);

    $usuarioId = (int)$_SESSION["idusuario"];
    
    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        if (isset($_POST["nombre"], $_POST["desc"], $_POST["prioridad"], $_POST["fecha"])) {
            $gestor->crearTarea($usuarioId, $_POST["nombre"], $_POST["desc"], $_POST["prioridad"], $_POST["fecha"]);
            header("Location: gestor.php");
            exit();

        } elseif (isset($_POST["action"], $_POST["index"])) {
            $tareaId = $_POST["index"];

            if ($_POST["action"] === "modificar" && isset($_POST["nuevo_nombre"])) {
                $gestor->modificarTarea($tareaId, $_POST["nuevo_nombre"]);
                header("Location: gestor.php");
                exit();
            } elseif ($_POST["action"] === "borrar") {
                $gestor->borrarTarea($tareaId);
                header("Location: gestor.php");
                exit();
            }
        }
    }

    $tareas = $gestor->getTareas($usuarioId);
} catch (PDOException $e) {
    echo "Error al conectar con la base de datos: " . $e->getMessage();
    exit();
}

require "views/gestor.view.php";
?>
