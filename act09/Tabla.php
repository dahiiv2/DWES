<?php 

class Tabla {
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
        $this->tabla[$fila][$columna] = new Celda($titulo, $fuente, $color); //creamos objeto Celda
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
                if ($datos) { // si hay información en la celda la creamos, ahora usando los getters
                    echo "<td style='color: " . $datos->getColorFuente() . "; background-color: " . $datos->getColorFondo() . ";'>" . $datos->getTexto() . "</td>";
                } else { // si no, celda vacia
                    echo "<td></td>";
                }
            }
            echo "</tr>";
        }
        echo "</table>";
    }

    //metodo insertar, inserta la celda en el array mediante la posicion y con el objeto celda
    public function insertar($celda, $fila, $columna) {
        $this->tabla[$fila][$columna] = $celda;
    }
}

class Celda {
    private $texto;
    private $colorFuente;
    private $colorFondo;

    public function __construct($texto, $colorFuente, $colorFondo) {
        $this->texto = $texto;
        $this->colorFuente = $colorFuente;
        $this->colorFondo = $colorFondo;
    }

    //getters para introducir en tabla
    public function getTexto() {
        return $this->texto;
    }

    public function getColorFuente() {
        return $this->colorFuente;
    }

    public function getColorFondo() {
        return $this->colorFondo;
    }
}

?>
