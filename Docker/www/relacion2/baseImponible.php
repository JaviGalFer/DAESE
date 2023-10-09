<?php
// Datos de la factura
$baseImponible = $_POST["num1"]; // Base imponible en euros
$iva = 0.21; // Tasa de IVA (21%)

// Calcular el total de la factura
$total = $baseImponible + ($baseImponible * $iva);

// Mostrar el resultado
echo "El total de la factura es: " . $total;
?>
