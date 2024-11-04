<?php
class Tarea {
    private $nombre;
    private $desc;
    private $prio;
    private $fecha;

    //constructor
    public function __construct($nombre, $desc, $prio, $fecha) {
        $this->nombre = $nombre;
        $this->desc = $desc;
        $this->prio = $prio;
        $this->fecha = $fecha;
    }

    //getters y setters
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setDesc($desc) {
        $this->desc = $desc;
    }

    public function getDesc() {
        return $this->desc;
    }

    public function setPrio($prio) {
        $this->prio = $prio;
    }

    public function getPrio() {
        return $this->prio;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    public function getFecha() {
        return $this->fecha;
    }
}