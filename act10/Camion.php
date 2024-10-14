<?php
    class Camion extends Cuatro_Ruedas {
        private $longitud;

        //constructor
        public function __construct($color, $peso, $numero_puertas, $longitud) {
            parent::__construct($color, $peso, $numero_puertas);
            $this->longitud = $longitud;
        }

        //getters y setters
        public function getLongitud() {
            return $this->longitud;
        }

        public function setLongitud($longitud) {
            $this->longitud = $longitud;
        }

        //añade la longitud del remolque
        public function añadir_remolque($longitud_remolque) {
            $this->setLongitud($this->longitud + $longitud_remolque);
        }



    }