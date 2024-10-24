<?php
    class Persona {
        private $nombre;
        private $apellidos;
        private $edad;
        private $DNI;

        //getters y setters

        public function setNombre($nombre) {
            $this->nombre = $nombre;
        }

        public function getNombre() {
            return $this->nombre;
        }

        public function setApellidos($apellidos) {
            $this->apellidos = $apellidos;
        }

        public function getApellidos() {
            return $this->apellidos;
        }

        public function setEdad($edad) {
            $this->edad = $edad;
        }

        public function getEdad() {
            return $this->edad;
        }

        public function setDNI($DNI) {
            $this->DNI = $DNI;
        }

        public function getDNI() {
            return $this->DNI;
        }

        //constructor
        public function __construct($nombre, $apellidos, $edad, $DNI) {
            $this->nombre = $nombre;
            $this->apellidos = $apellidos;
            $this->edad = $edad;
            $this->DNI = $DNI;
        }

        //devuelve true si es mayor o tiene 18 y falso si no
        public function mayorEdad() {
            if ($this->edad >= 18) {
                return true;
            } else {
                return false;
            }
        }

        //devuelve nombre y apellidos
        public function nombreCompleto() {
            return $this->nombre . " " . $this->apellidos;
        }

        //calculamos letra del DNI
        public function identificacionCompleta() {
            //array de letras ordenadas del DNI
            $letras = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E'];
            //sacamos los primeros 8 numeros del DNI
            $numero = intval(substr($this->DNI, 0, 8));
            //cogemos la posicion del dni entre 23, esa sera la letra
            $letra = $letras[$numero % 23];
            return $this->DNI . $letra;
        }
    }
?>