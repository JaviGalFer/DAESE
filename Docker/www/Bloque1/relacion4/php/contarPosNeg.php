<?php
    if (!empty($_POST['numeros'])) {
        $numeros = explode(",", $_POST['numeros']);
        $positivos = 0;
        $negativos = 0;
        foreach ($numeros as $numero) {
            if ($numero > 0) {
                $positivos++;
            } elseif ($numero < 0) {
                $negativos++;
            }
        }
        echo "De los números ingresados, $positivos son positivos y $negativos son negativos.";
    } else {
        echo "Por favor, introduce diez números separados por comas.";
    }
    ?>