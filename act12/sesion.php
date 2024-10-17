<?php
//empezamos sesion
session_start();

class sesion {

    //constructor, automaticamente llama a setAttribute para crear el atributo
    public function __construct($atributo, $valor) {
        $this->setAttribute($atributo, $valor);
    }

    //asigna el valor al atributo
    function setAttribute($atributo, $valor) {
        $_SESSION["$atributo"] = $valor;
    }

    //devuelve atributo, si no hay lo dice
    function getAttribute($atributo) {
        return $_SESSION["$atributo"] ?? "Atributo no existe";
    }

    //borramos el atributo
    function deleteAttribute($atributo) {
        unset($_SESSION[$atributo]);
    }

    //borra la sesión
    function destroySession() {
        session_destroy();
    }

}