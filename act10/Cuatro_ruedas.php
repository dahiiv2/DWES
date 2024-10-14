<?php
    class Cuatro_Ruedas extends Vehículo {
        private $numero_puertas;

        //constructor
        public function __construct($color, $peso, $numero_puertas) {
            parent::__construct($color, $peso);
            $this->numero_puertas = $numero_puertas;    
        }

        //getters y setters
        public function getNumeroPuertas() {
            return $this->numero_puertas;
        }

        public function setNumeroPuertas($numero_puertas) {
            $this->numero_puertas = $numero_puertas;
        }

        //pinta el vehículo
        public function repintar($color) {
            $this->setColor($color);
        }

        //metodo abstracto de Vehículo
        public function añadir_persona($peso_persona) {
            $this->setPeso($this->getPeso() + $peso_persona);
        }

    }