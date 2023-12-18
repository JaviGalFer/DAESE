<?php

// Clase abstracta Animal
abstract class Animal {
    protected $nombre;

    abstract public function hacerSonido();
    abstract public function moverse();

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getNombre() {
        return $this->nombre;
    }
}

?>