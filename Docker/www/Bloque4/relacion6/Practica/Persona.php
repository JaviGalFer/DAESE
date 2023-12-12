<?php

class Persona {
    // Atributos
    public $nombre;
    public $apellidos;
    public $edad;

    // Constructor
    public function __construct($nombre, $apellidos, $edad) {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->edad = $edad;
    }

    // Función saludar
    public function saludar() {
        echo "Hola {$this->nombre} {$this->apellidos}<br>";
    }

    // Redefinir la función __toString
    public function __toString() {
        return "Nombre: {$this->nombre}<br> Apellidos: {$this->apellidos}<br>  Edad: {$this->edad}<br>";
    }
}

?>
