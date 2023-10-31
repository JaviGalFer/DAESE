<?php
    if (!empty($_POST['numero'])) {
        $limite = $_POST['numero'];
        $contador = 0;
        $suma = 0;

        echo "<p>Los múltiplos de 3 entre 1 y $limite son: </p>";

        for ($i = 1; $i <= $limite; $i++) {
            if ($i % 3 == 0) {
                echo "$i, ";
                $contador++;
                $suma += $i;
            }
        }

        echo "<p>La cantidad de múltiplos de 3 es: $contador</p>";
        echo "<p>La suma de los múltiplos de 3 es: $suma</p>";
    } else {
        echo "<p>Por favor, introduce un número.</p>";
    }
?>