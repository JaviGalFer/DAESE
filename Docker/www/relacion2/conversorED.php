<?php
// Cantidad en euros que se quiere convertir
$euros = $_POST["num1"];

// Tasa de cambio de euros a dólares
$tasa = 1.18;

// Conversión a dólares
$dolares = $euros * $tasa;

// Mostramos el resultado
echo $euros ." euros equivalen a ".$dolares. " dólares.";
?>
