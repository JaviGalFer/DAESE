<?php
// Datos del cono
$radio = $_POST["num1"]; // Radio de la base en centímetros
$altura = $_POST["num2"]; // Altura en centímetros
$pi = 3.14159; // Valor de Pi

// Calcular el volumen del cono
$volumen = (1/3) * $pi * $radio * $radio * $altura;

// Mostrar el resultado
echo "El volumen del cono es: " . $volumen . " cm³";
?>
