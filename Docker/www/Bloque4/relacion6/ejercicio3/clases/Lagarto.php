<?php
require_once 'Animales.php';
// Clase Lagarto que hereda de Animal
class Lagarto extends Animal {
    public function hacerSonido() {
        return "Hace sonidos sibilantes.";
    }

    public function moverse() {
        return "El lagarto se desplaza reptando.";
    }

    public function cambiarColor() {
        return "El lagarto puede cambiar de color para camuflarse.";
    }
}

?>