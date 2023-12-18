<?php
require_once 'Mamifero.php';
// Clase Perro que hereda de Mamífero
class Perro extends Mamifero {
    public function hacerSonido() {
        return "¡Guau!";
    }

    public function moverse() {
        return "El perro se desplaza corriendo.";
    }

    public function amamantar() {
        return "El perro no amamanta, pero se alimenta con croquetas.";
    }
}


?>