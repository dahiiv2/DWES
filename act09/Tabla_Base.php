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
        //array asiociativo para guardar cada celda, ej tabla[1][1]
        $this->tabla[$fila][$columna] = [
            "titulo" => $titulo,
            "fuente" => $fuente,
            "color" => $color
        ];
    }
    
    public function graficar() {
        echo "<table border='1'>";
        // por cada objeto dentro de tabla, las filas
        // esto me ha costado mucho entenderlo pero por ejemplo ahora estamos iterando esto: fila es por ejemplo 1, y columna los valores
        //        1 => ["titulo" => "A1", "fuente" => "Arial", "color" => "#FFFFFF"],
        //        2 => ["titulo" => "B1", "fuente" => "Arial", "color" => "#FFFFFF"],
        foreach ($this->tabla as $fila => $columna) {
            echo "<tr>";
            // ahora que estamos dentro de las filas, por cada columna, cogemos $columna, que seria por ejemplo Titulo, y $datos que seria A1
            foreach ($columna as $columna => $datos) {
                if ($datos) { // si hay información en la celda la creamos
                    echo "<td style='color: " . $datos['fuente'] . "; background-color: " . $datos['color'] . ";'>" . $datos['titulo'] . "</td>";
                } else { // si no, celda vacia
                    echo "<td></td>";
                }
            }
            echo "</tr>";
        }
        echo "</table>";
    }
}

?>
