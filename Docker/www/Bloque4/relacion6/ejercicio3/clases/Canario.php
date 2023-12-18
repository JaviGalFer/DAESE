<?php
require_once 'Ave.php';
// Clase Canario que hereda de Ave
class Canario extends Ave {
    public function hacerSonido() {
        return "¡Pío!";
    }

    public function moverse() {
        return "El canario se mueve saltando de rama en rama.";
    }

    public function volar() {
        return "El canario vuela por los cielos.";
    }
}

?>