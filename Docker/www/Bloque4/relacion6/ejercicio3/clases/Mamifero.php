<?php

require_once 'Animales.php';

// Clase abstracta Mamífero que hereda de Animal
abstract class Mamifero extends Animal {
    abstract public function amamantar();
}

?>