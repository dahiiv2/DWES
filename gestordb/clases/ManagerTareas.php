<?php
class ManagerTareas {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

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

    public function getTareas($usuarioId) {
        $query = "SELECT ID AS id, Nombre AS nombre, Descripción AS descripcion, Prioridad AS prioridad, Fecha AS fecha FROM tareas WHERE id_usuario = :id_usuario";
        $select = $this->pdo->prepare($query);
        $select->bindParam(":id_usuario", $usuarioId);
        $select->execute();
        //fetchobj lo devuelve como objeto
        return $select->fetchAll(PDO::FETCH_OBJ);
    }

    public function modificarTarea($tareaId, $nuevo_nombre) {
        $query = "UPDATE tareas SET Nombre = :nombre WHERE ID = :id";
        $select = $this->pdo->prepare($query);
        $select->bindParam(":nombre", $nuevo_nombre);
        $select->bindParam(":id", $tareaId);
        $select->execute();
    }

    public function borrarTarea($tareaId) {
        $query = "DELETE FROM tareas WHERE ID = :id";
        $select = $this->pdo->prepare($query);
        $select->bindParam(":id", $tareaId);
        $select->execute();
    }
}
?>
