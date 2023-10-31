<?php
    if (!empty($_POST['numero'])) {
        $numero = $_POST['numero'];
        if ($numero < 0) {
            echo "El número debe ser positivo.";
        } else {
            $suma = 0;
            for ($i = $numero + 1; $i <= $numero + 100; $i++) {
                $suma += $i;
            }
            echo "La suma de los 100 números siguientes a $numero es: $suma";
        }
    } else {
        echo "Por favor, introduce un número entero y positivo.";
    }
    ?>