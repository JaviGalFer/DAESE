<?php
// Asignamos valores a las variables $x y $y
$x = $_POST["num1"];
$y = $_POST["num2"];

// Mostramos los valores de las variables
echo "El valor de x es: " . $x . "<br>";
echo "El valor de y es: " . $y . "<br><br>";

// Realizamos operaciones matemáticas
$suma = $x + $y;
$resta = $x - $y;
$division = $x / $y;
$multiplicacion = $x * $y;

// Mostramos los resultados de las operaciones
echo "La suma de $x y $y es: " . $suma . "<br>";
echo "La resta de $x y $y es: " . $resta . "<br>";
echo "La división de $x entre $y es: " . $division . "<br>";
echo "La multiplicación de $x y $y es: " . $multiplicacion . "<br>";
?>