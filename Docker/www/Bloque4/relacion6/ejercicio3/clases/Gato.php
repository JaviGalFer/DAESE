<?php
require_once 'Mamifero.php';
// Clase Gato que hereda de Mamífero
class Gato extends Mamifero {
    public function hacerSonido() {
        return "¡Miau!";
    }

    public function moverse() {
        return "El gato se mueve con elegancia.";
    }

    public function amamantar() {
        return "El gato no amamanta, pero se alimenta con leche.";
    }
}


?>