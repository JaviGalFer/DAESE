<?php
require_once 'Poligono.php';

// Clase Triangulo que hereda de Poligono
class Triangulo extends Poligono {
    private $base;
    private $altura;

    public function __construct($base, $altura) {
        $this->base = $base;
        $this->altura = $altura;
    }

    public function calcularArea() {
        return 0.5 * $this->base * $this->altura;
    }
}
?>