<?php
    class Coche extends Cuatro_Ruedas {
        private $numero_cadenas_nieve;

        //constructor
        public function __construct($color, $peso, $numero_puertas, $numero_cadenas_nieve) {
            parent::__construct($color, $peso, $numero_puertas);
            $this->numero_cadenas_nieve = $numero_cadenas_nieve;
        }

        //getters y setters
        public function getNumeroCadenasNieve() {
            return $this->numero_cadenas_nieve;
        }

        public function setNumeroCadenasNieve($numero_cadenas_nieve) {
            $this->numero_cadenas_nieve = $numero_cadenas_nieve;
        }

        //añade cadena nieve
        public function añadir_cadenas_nieve($cadenas) {
            $this->setNumeroCadenasNieve($this->numero_cadenas_nieve + $cadenas);
        }

        //quita cadena nieve
        public function quitar_cadenas_nieve($cadenas) {
            $this->numero_cadenas_nieve -= $cadenas;
            if ($this->numero_cadenas_nieve < 0) { //si va a menor que 0 lo ponemos a 0
                $this->numero_cadenas_nieve = 0;
            }
        }

        //metodo abstracto de Vehículo
        public function añadir_persona($peso_persona) {
            // llama al método añadir_persona de la clase padre
            parent::añadir_persona($peso_persona);
    
            // verifica el peso total y el número de cadenas
            if ($this->getPeso() >= 1500 && $this->numero_cadenas_nieve <= 2) {
                echo "Atención, ponga 4 cadenas para la nieve.<br>";
            }
        }


    }