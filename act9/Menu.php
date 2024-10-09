<?php

    class Menu {
        
        private $opciones = [];

        public function cargarOpcion($enlace, $texto) {
            $this->opciones[] = array('enlace' => $enlace, 'texto' => $texto);
        }

        public function mostrar($orientacion) {
            if ($orientacion == "horizontal") {
                $this->mostrarHorizontal();
            } elseif ($orientacion == "vertical") {
                $this->mostrarVertical();
            }
        }

        private function mostrarHorizontal() {
            echo "<table> <tr>";
            foreach ($this->opciones as $opcion) {
                echo "<td><a href='" . $opcion['enlace'] . "'>" . $opcion['texto']."</a></td>";
            }
            echo "</tr></table>";
        }

        private function mostrarVertical() {
            foreach ($this->opciones as $opcion) {
                echo "<a href='" . $opcion['enlace'] . "'>" . $opcion['texto'] . "</a><br>";
            }
        }
    }
?>