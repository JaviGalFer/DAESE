<?php
require_once 'Ave.php';
// Clase Pingüino que hereda de Ave
class Pinguino extends Ave {
    public function hacerSonido() {
        return "¡Cua-cua!";
    }

    public function moverse() {
        return "El pingüino se desliza sobre el hielo.";
    }

    public function volar() {
        return "El pingüino no puede volar, pero nada hábilmente.";
    }
}

?>