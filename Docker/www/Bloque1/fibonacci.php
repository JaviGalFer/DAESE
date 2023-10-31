<?php
function fibonacci($n) {
    if ($n <= 0) {
        return 0;
    } elseif ($n == 1) {
        return 1;
    } else {
        return fibonacci($n - 1) + fibonacci($n - 2);
    }
}

$n = 10;
$resultado = fibonacci($n);

echo "El término número $n de la secuencia de Fibonacci es: $resultado";
?>
