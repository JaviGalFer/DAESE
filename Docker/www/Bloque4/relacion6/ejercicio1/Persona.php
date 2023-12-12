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

    //Getter y Setter para el nombre
    public function getNombre() {
        return $this->nombre;
    }
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    //Getter y Setter para el apellido
    public function getApellidos() {
        return $this->apellidos;
    }
    public function setApellidos($apellidos) {
        $this->apellidos = $apellidos;
    }

    //Función para comprobar si es mayor de edad
    public function esMayorEdad() {
        return $this->edad >= 18;
    }

    //Función para mostrar el nombre completo
    public function getNombreCompleto() {
        return "{$this->nombre}  {$this->apellidos}";
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
