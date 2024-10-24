<?php
class Usuario {
    private $nombre;
    private $contrasenya;

    public function __construct($nombre, $contrasenya) {
        $this->nombre = $nombre;
        $this->setContrasenya($contrasenya);
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getContrasenya() {
        return $this->contrasenya;
    }

    public function setContrasenya($contrasenya) {
        $this->validarContrasenya($contrasenya);
        $this->contrasena = $contrasenya;
    }

    public function validarContrasenya($contrasenya) {
        if (strlen($contrasenya) < 6) {
            throw new ContrasenaInvalidaException("La contraseña debe tener al menos 6 caracteres.");
        }
        if (strlen($contrasenya) > 15) {
            throw new ContrasenaInvalidaException("La contraseña debe tener menos de 16 caracteres.");
        }
        if (!preg_match('`[A-Z]`', $contrasenya)) {
            throw new ContrasenaInvalidaException("La contraseña debe tener al menos una letra mayúscula.");
        }
        if (!preg_match('`[a-z]`', $contrasenya)) {
            throw new ContrasenaInvalidaException("La contraseña debe tener al menos una letra minúscula.");
        }
        if (!preg_match('`[0-9]`', $contrasenya)) {
            throw new ContrasenaInvalidaException("La contraseña debe tener al menos un número.");
        }
    }
}
