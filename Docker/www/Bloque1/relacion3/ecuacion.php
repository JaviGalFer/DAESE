
<?php
// Obtén los valores de 'a' y 'b' ingresados desde el formulario
$a = $_POST["num1"];
$b = $_POST["num2"];

// Verifica si 'a' es igual a cero (ecuación degenerada)
if ($a == 0) {
    echo "<p>La ecuación no tiene solución.</p>";
} else {
    // Resuelve la ecuación y muestra el resultado
    $solucion = -$b / $a;
    echo "<h1>La solución de la ecuación es: x = $solucion</h1>";
}

?>

