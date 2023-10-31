<?php
// Cantidad en dólares que se quiere convertir
$dolares = $_POST["num1"]; 

// Tasa de cambio de dólares a euros
$tasa = 0.85;

// Conversión a euros
$euros = $dolares * $tasa;

// Mostrar el resultado
echo $dolares .  " dólares equivalen a " .$euros." euros.";
?>
