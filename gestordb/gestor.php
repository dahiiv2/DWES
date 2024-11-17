<?php
session_start();

require "clases/ManagerTareas.php";
require "clases/Mail.php";


// si el usuario no está logeado, redirigimos al login
if (!isset($_SESSION["idusuario"])) {
    header("Location: index.php");
    exit();
}

$hostDB = "localhost";
$nombreDB = "dwes";
$userDB = "root";
$passDB = "";

// creamos la conexión
$dsn = "mysql:host=$hostDB;dbname=$nombreDB;";
try {
    $pdo = new PDO($dsn, $userDB, $passDB);
    $gestor = new ManagerTareas($pdo);
    $mailer = new Mail();
    
    //recogemos la id del usuario
    $usuarioId = (int)$_SESSION["idusuario"];
    $usuario = $_SESSION["nombre"];
    
    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        // crear una nueva tarea
        if (isset($_POST["nombre"], $_POST["desc"], $_POST["prioridad"], $_POST["fecha"])) {
            $gestor->crearTarea($usuarioId, $_POST["nombre"], $_POST["desc"], $_POST["prioridad"], $_POST["fecha"]);

            // enviar correo al crear tarea
            $mailer->enviarMailCrear($usuario, $_POST["nombre"], $_POST["desc"], $_POST["prioridad"], $_POST["fecha"]);

            header("Location: gestor.php");
            exit();

        // acciones de modificar o borrar tareas existentes
        } elseif (isset($_POST["action"], $_POST["index"])) {
            $tareaId = $_POST["index"];

            // modificar el nombre de la tarea
            if ($_POST["action"] === "modificar" && isset($_POST["nuevo_nombre"])) {

                // obtenemos la tarea para enviar el correo de modificación
                $tarea = $gestor->getTareaById($tareaId);

                //guardamos el nombre de antes de modificar
                $nombreViejo = $tarea->nombre;

                $gestor->modificarTarea($tareaId, $_POST["nuevo_nombre"]);

                // obtenemos la info nueva de la tarea
                $tarea = $gestor->getTareaById($tareaId);

                // enviar correo al modificar tarea
                $mailer->enviarMailModificar($nombreViejo, $usuario, $tarea->nombre, $tarea->descripcion, $tarea->prioridad, $tarea->fecha);


                header("Location: gestor.php");
                exit();

            // borrar la tarea
            } elseif ($_POST["action"] === "borrar") {

                // obtenemos la tarea para enviar el correo de borrado
                $tarea = $gestor->getTareaById($tareaId);

                if ($tarea) {
                    // enviar correo al borrar tarea
                    $mailer->enviarMailBorrar($usuario, $tarea->nombre, $tarea->descripcion, $tarea->prioridad, $tarea->fecha);
            
                    $gestor->borrarTarea($tareaId);
                }

                header("Location: gestor.php");
                exit();
            }
        }
    }

    // obtenemos todas las tareas del usuario
    $tareas = $gestor->getTareas($usuarioId);
} catch (PDOException $e) {
    echo "Error al conectar con la base de datos: " . $e->getMessage();
    exit();
}

// al final para que se ejecute todo lo de antes
require "views/gestor.view.php";
?>
