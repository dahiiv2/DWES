<?php
//nuestra excepcion
class ContrasenaInvalidaException extends Exception {
    public function __construct($message) {
        parent::__construct($message);
    }
}
