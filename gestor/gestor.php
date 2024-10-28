<?php
    session_start();
    
    require 'Tarea.php';
    require 'ManagerTareas.php';

    //si no hay una sesion de gestor (array de tareas), creamos una y la serializamos
    if (!isset($_SESSION["gestor"])) {
        $gestor = new ManagerTareas(); 
        $_SESSION["gestor"] = serialize($gestor);
    } else {
    //si la hay, la unserializamos
        $gestor = unserialize($_SESSION["gestor"]);
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        //si hay action es porque el post viene del formulario de borrar o modificar, guardamos el action y el index
        if (isset($_POST["action"])) {
            $action = $_POST["action"];
            $index = $_POST["index"];
            
            //si el action es modificar, cambiamos el nombre de la tarea en la posicion index
            if ($action == "modificar") {
                $nuevo_nombre = $_POST["nuevo_nombre"];
                $gestor->modificarTarea($index, $nuevo_nombre);
            //si el action es borrar, borramos la tarea
            } elseif ($action == "borrar") {
                $gestor->borrarTarea($index);
            }
        // si no hay action, es que se el post viene de una creacion de tarea
        } else {
            $nombre = $_POST["nombre"];
            $desc = $_POST["desc"];
            $prioridad = $_POST["prioridad"];
            $fecha = $_POST["fecha"];

            //creamos tarea y la añadimos al array
            $tarea = new Tarea($nombre, $desc, $prioridad, $fecha);
            $gestor->crearTarea($tarea);
        }

        //serialiamos lo que tengamos guardado en el array de tareas y volvemos a la página
        $_SESSION["gestor"] = serialize($gestor);
        //volvemos a gestor para ejecutar el las ultimas dos lineas
        header("Location: gestor.php");
        exit();
    }
    
    //obtenemos las tareas del gestor y las guardamos en la variable $tareas, esto se llama cuando volvemos a gestor sin un post
    $tareas = $gestor->getTareas();

    //esto fue un gran problema, pero hay que poner lo al final para que renderize todo DESPUES de el codigo de arriba
    require 'views/gestor.view.php';