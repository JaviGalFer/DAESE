<?php
// Datos del trabajador
$horasTrabajadas = $_POST["num1"]; // Horas trabajadas en la semana
$tarifaHora = 12; // Tarifa por hora en euros

// Calcular el salario semanal
$salario = $horasTrabajadas * $tarifaHora;

// Mostrar el resultado
echo "Tú salario semanal es: " . $salario . "€";
?>
