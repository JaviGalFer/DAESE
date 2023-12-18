<?php
require_once 'Poligono.php';

// Clase Cuadrado que hereda de Poligono
class Cuadrado extends Poligono {
    private $lado;

    public function __construct($lado) {
        $this->lado = $lado;
    }

    public function calcularArea() {
        return $this->lado * $this->lado;
    }
}
?>