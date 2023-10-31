<?php
// Obtén las tres notas ingresadas desde el formulario
$nota1 = $_POST["num1"];
$nota2 = $_POST["num2"];
$nota3 = $_POST["num3"];

// Calcula la media de las notas
$media = ($nota1 + $nota2 + $nota3) / 3;
// Determina la nota del boletín
$nota_boletin = '';
switch (true) {
    case ($media < 5):
        $nota_boletin = 'Insuficiente';
        break;
    case ($media >= 5 && $media < 6):
        $nota_boletin = 'Suficiente';
        break;
    case ($media >= 6 && $media < 7):
        $nota_boletin = 'Bien';
        break;
    case ($media >= 7 && $media < 9):
        $nota_boletin = 'Notable';
        break;
    case ($media >= 9):
        $nota_boletin = 'Sobresaliente';
        break;
}

echo "<h1>La media de las tres notas es: $media</h1>";
echo "<h2>Nota del boletín: $nota_boletin</h2>";
?>

