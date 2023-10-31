<?php
    if (!empty($_POST['base']) && !empty($_POST['exponente'])) {
        $base = $_POST['base'];
        $exponente = $_POST['exponente'];
        echo "Potencias de $base hasta el exponente $exponente: <br>";
        for ($i = 1; $i <= $exponente; $i++) {
            $potencia = 1;
            for ($j = 1; $j <= $i; $j++) {
                $potencia *= $base;
            }
            echo "$potencia <br>";
        }
    } else {
        echo "Por favor, introduce la base y el exponente.";
    }
    ?>