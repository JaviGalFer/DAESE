<?php
// Datos del rectángulo
$base = $_POST["num1"]; // Longitud de la base
$altura = $_POST["num2"]; // Altura

// Calcular el área del rectángulo
$area = $base * $altura;

// Mostrar el resultado
echo "El área del rectángulo es: " . $area;
?>
