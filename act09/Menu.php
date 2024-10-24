<?php

    class Menu {
        
        private $opciones = [];

        //similar a un constructor, añade al array un objeto con un enlace y el titulo
        public function cargarOpcion($enlace, $texto) {
            $this->opciones[] = array('enlace' => $enlace, 'texto' => $texto);
        }

        //dependiendo de si le pasamos horizontal o vertical, llama una funcion u otra
        public function mostrar($orientacion) {
            if ($orientacion == "horizontal") {
                $this->mostrarHorizontal();
            } elseif ($orientacion == "vertical") {
                $this->mostrarVertical();
            }
        }

        //para mostrarlos horizontalmente, creamos una tabla tr y introducimos cada enlace en un a y el titulo dentro
        private function mostrarHorizontal() {
            echo "<table> <tr>";
            foreach ($this->opciones as $opcion) {
                echo "<td><a href='" . $opcion['enlace'] . "'>" . $opcion['texto']."</a></td>";
            }
            echo "</tr></table>";
        }

        //simplemente creamos un a para cada objeto
        private function mostrarVertical() {
            foreach ($this->opciones as $opcion) {
                echo "<a href='" . $opcion['enlace'] . "'>" . $opcion['texto'] . "</a><br>";
            }
        }
    }
?>