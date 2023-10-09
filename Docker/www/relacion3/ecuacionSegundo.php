<?php
// Obtén los valores de 'a', 'b' y 'c' ingresados desde el formulario
$a = $_POST["num1"];
$b = $_POST["num2"];
$c = $_POST["num3"];

// Calcula el discriminante
$discriminante = ($b * $b) - (4 * $a * $c);

// Determina las soluciones de la ecuación
if ($discriminante > 0) {
    $solucion1 = (-$b + sqrt($discriminante)) / (2 * $a);
    $solucion2 = (-$b - sqrt($discriminante)) / (2 * $a);
    echo "<h1>Las soluciones son: x1 = $solucion1 y x2 = $solucion2</h1>";
} elseif ($discriminante == 0) {
    $solucion = -$b / (2 * $a);
    echo "<h1>La solución doble es: x = $solucion</h1>";
} else {
    echo "<h1>No existen soluciones reales para la ecuación.</h1>";
}

?>


