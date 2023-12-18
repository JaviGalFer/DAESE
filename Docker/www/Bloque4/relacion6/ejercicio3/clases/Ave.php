<?php
require_once 'Animales.php';

// Clase abstracta Ave que hereda de Animal
abstract class Ave extends Animal {
    abstract public function volar();
}

?>