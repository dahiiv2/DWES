<?php

    class Tabla_Base {

        private $filas;
        private $columnas;
        private $tabla;

        public function __construct($filas, $columnas) {
            $this->filas = $filas;
            $this->columnas = $columnas;
            $this->tabla = [];
        }

        public function cargar($fila, $columna, $titulo, $fuente, $color) {
            $this->tabla[$fila][$columna] = [
                'titulo' => $titulo,
                'fuente' => $fuente,
                'color' => $color
            ];
        }

        public function graficar() {
        }
    }

?>
