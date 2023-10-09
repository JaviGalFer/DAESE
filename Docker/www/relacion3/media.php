<?php
// Obtén las tres notas ingresadas desde el formulario
$nota1 = $_POST["num1"];
$nota2 = $_POST["num2"];
$nota3 = $_POST["num3"];

// Calcula la media de las notas
$media = ($nota1 + $nota2 + $nota3) / 3;

echo "<h1>La media de las tres notas es: $media</h1>";
?>

