<?php
// Datos en kilobytes
$kb = $_POST["num1"]; // Cantidad en kilobytes

// Convertir a megabytes
$mb = $kb / 1024;

// Mostrar el resultado
echo $kb . " KB son equivalentes a " . $mb . " MB";
?>
