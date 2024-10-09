<?php
    class CabeceraPagina {
        private $titulo;
        private $centrado;
        private $color;
        private $fuente;

        public function __construct($titulo, $centrado, $color, $fuente) {
            $this->titulo = $titulo;
            $this->centrado = $centrado;
            $this->color = $color;
            $this->fuente = $fuente;
        }

        public function graficar() {
            echo 
            "<h1 
                style='text-align: $this->centrado;
                background-color: $this->color;
                font-family: $this->fuente;'
                >$this->titulo
            </h1>";
        }

    


    }
?>