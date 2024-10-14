<?php
    class Dos_Ruedas extends Vehículo {
        private $cilindrada;

        //constructor
        public function __construct($color, $peso, $cilindrada) {
            parent::__construct($color, $peso);
            $this->cilindrada = $cilindrada;    
        }

        //getters y setters
        public function getCilindrada() {
            return $this->cilindrada;
        }

        public function setCilindrada($cilindrada) {
            $this->cilindrada = $cilindrada;
        }

        //metodo abstracto de Vehículo, añade 2kg por el casco
        public function añadir_persona($peso_persona) {
            $this->setPeso($this->getPeso() + $peso_persona + 2);
        }

        //pone gasolina en el vehiculo y modifica el peso
        public function poner_gasolina($litro) {
            $this->setPeso($this->getPeso() + $litro);
        }

    }