<?php
class ManagerTareas {
    private $pdo;

    // constructor que inicializa la conexión con la base de datos
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // crear una nueva tarea para un usuario específico
    public function crearTarea($usuarioId, $nombre, $desc, $prio, $fecha) {
        $query = "INSERT INTO tareas (Nombre, Descripción, Prioridad, Fecha, id_usuario) VALUES (:nombre, :descripcion, :prioridad, :fecha, :id_usuario)";
        $select = $this->pdo->prepare($query);
        $select->bindParam(":nombre", $nombre);
        $select->bindParam(":descripcion", $desc);
        $select->bindParam(":prioridad", $prio);
        $select->bindParam(":fecha", $fecha);        
        $select->bindParam(":id_usuario", $usuarioId);
        $select->execute();
    }

    // obtener todas las tareas de un usuario
    public function getTareas($usuarioId) {
        $query = "SELECT ID AS id, Nombre AS nombre, Descripción AS descripcion, Prioridad AS prioridad, Fecha AS fecha FROM tareas WHERE id_usuario = :id_usuario";
        $select = $this->pdo->prepare($query);
        $select->bindParam(":id_usuario", $usuarioId);
        $select->execute();
        // devuelve las tareas en formato de objeto
        return $select->fetchAll(PDO::FETCH_OBJ);
    }

    // actualizar el nombre de una tarea específica
    public function modificarTarea($tareaId, $nuevo_nombre) {
        $query = "UPDATE tareas SET Nombre = :nombre WHERE ID = :id";
        $select = $this->pdo->prepare($query);
        $select->bindParam(":nombre", $nuevo_nombre);
        $select->bindParam(":id", $tareaId);
        $select->execute();
    }

    // eliminar una tarea específica
    public function borrarTarea($tareaId) {
        $query = "DELETE FROM tareas WHERE ID = :id";
        $select = $this->pdo->prepare($query);
        $select->bindParam(":id", $tareaId);
        $select->execute();
    }
}
?>
