<?php
class ManagerTareas {
    private $tareas = [];

    public function crearTarea($tarea) {
        $this->tareas[] = $tarea;
    }

    public function getTareas() {
        return $this->tareas;
    }

    //metodo para modificar el nombre de una tarea por su indice
    public function modificarTarea($index, $nuevo_nombre) {
        $this->tareas[$index]->setNombre($nuevo_nombre);
    }

    //metodo para eliminar una tarea por su indice
    public function borrarTarea($index) {
        unset($this->tareas[$index]);
        $this->tareas = array_values($this->tareas);
    }
}
?>
