<?php
// Obtén las horas trabajadas ingresadas desde el formulario
$horas_trabajadas = $_POST["num1"]; 

// Define las tarifas de pago
$tarifa_hora_ordinaria = 12;
$tarifa_hora_extra = 16;
$horas_ordinarias = 40;

// Calcula el salario semanal
if ($horas_trabajadas <= $horas_ordinarias) {
    $salario = $horas_trabajadas * $tarifa_hora_ordinaria;
} else {
    $salario = $horas_ordinarias * $tarifa_hora_ordinaria + 
                ($horas_trabajadas - $horas_ordinarias) * $tarifa_hora_extra;
}

echo "<h1>Salario semanal: $salario euros</h1>";
?>