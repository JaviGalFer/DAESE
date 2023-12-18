<?php

require_once 'clases/Triangulo.php';
require_once 'clases/Cuadrado.php';
require_once 'clases/Rectangulo.php';

//
$triangulo = new Triangulo(6, 8);
echo "Área del Triángulo: " . $triangulo->calcularArea() . "<br>";

$cuadrado = new Cuadrado(5);
echo "Área del Cuadrado: " . $cuadrado->calcularArea() . "<br>";

$rectangulo = new Rectangulo(4, 10);
echo "Área del Rectángulo: " . $rectangulo->calcularArea() . "<br>";
?>