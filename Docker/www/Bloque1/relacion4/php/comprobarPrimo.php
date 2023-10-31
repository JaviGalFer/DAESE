<?php
    if (!empty($_POST['numero'])) {
        $numero = $_POST['numero'];
        $esPrimo = true;
        if ($numero <= 1) {
            $esPrimo = false;
        } else {
            for ($i = 2; $i <= sqrt($numero); $i++) {
                if ($numero % $i == 0) {
                    $esPrimo = false;
                    break;
                }
            }
        }
        if ($esPrimo) {
            echo "El número $numero es primo.";
        } else {
            echo "El número $numero no es primo.";
        }
    } else {
        echo "Por favor, introduce un número entero.";
    }
    ?>