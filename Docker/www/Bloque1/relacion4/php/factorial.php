<?php
    function calcularFactorial($numero) {
        if ($numero == 0) {
            return 1;
        } else {
            $factorial = 1;
            for ($i = 1; $i <= $numero; $i++) {
                $factorial *= $i;
            }
            return $factorial;
        }
    }

    if (!empty($_POST['numero'])) {
        $numero = $_POST['numero'];
        $resultado = calcularFactorial($numero);
        echo "<p>El factorial de $numero es: $resultado</p>";
    } else {
        echo "<p>Por favor, introduce un número entero.</p>";
    }
?>