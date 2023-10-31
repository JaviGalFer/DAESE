<?php
// Datos en megabytes
$mb = $_POST["num1"]; // Cantidad en megabytes

// Convertir a kilobytes
$kb = $mb * 1024;

// Mostrar el resultado
echo $mb . " MB son equivalentes a " . $kb . " KB";
?>
