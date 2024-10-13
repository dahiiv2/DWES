<?php
    abstract class Vehículo {
        private $color;
        private $peso;

        static protected $numero_cambio_color = 0;

        //constructor
        public function __construct($color, $peso) {
            $this->color = $color;
            $this->peso = $peso;
        }

        //getters y setters
        public function getColor() {
            return $this->color;
        }

        public function setColor($color) {
            $this->color = $color;
            //self para acceder a la variable estática
            self::$numero_cambio_color++;
        }

        public function getPeso() {
            return $this->peso;
        }

        public function setPeso($peso) {
            //pone el peso a 2100 si lo sobrepasa
            $this->peso = ($peso > 2100) ? 2100 : $peso;
        }

        //muestra que el vehiculo circula
        public function circular() {
            echo "El vehículo circula. <br>";
        }

        //añade una persona y cambia el peso
        abstract public function añadir_persona($peso_persona);

        //muestra el valor del atributo del objeto pasado
        public static function ver_atributo($objeto) {
            //miramos si es un Vehículo
            if ($objeto instanceof Vehículo) {
                //mostramos color y peso ya que lo tienen todos los vehículos
                echo "Color: " . $objeto->getColor() . "<br>";
                echo "Peso: " . $objeto->getPeso() . " kg <br>";
                
                // dependiendo de si forma parte de una clase u otra mostramos la información necesaria
                if ($objeto instanceof Cuatro_Ruedas) {
                    echo "Número de puertas: " . $objeto->getNumeroPuertas() . "<br>";
                }
                if ($objeto instanceof Dos_Ruedas) {
                    echo "Cilindrada: " . $objeto->getCilindrada() . "<br>";
                }
                if ($objeto instanceof Coche) {
                    echo "Número de cadenas para nieve: " . $objeto->getNumeroCadenasNieve() . "<br>";
                }

                echo "Número de cambios de color: " . self::$numero_cambio_color . "<br>";
            } else {
                echo "El objeto no es un Vehículo.";
            }
        }
    }