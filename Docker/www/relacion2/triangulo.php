<?php
// Datos del triángulo
$base = $_POST["num1"]; // Longitud de la base
$altura = $_POST["num2"]; // Altura

// Calcular el área del triángulo
$area = ($base * $altura) / 2;

// Mostrar el resultado
echo "El área del triángulo es: " . $area;
?>
