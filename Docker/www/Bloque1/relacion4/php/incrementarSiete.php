<?php
    if (!empty($_POST['numero1']) && !empty($_POST['numero2'])) {
        $numero1 = $_POST['numero1'];
        $numero2 = $_POST['numero2'];

        if ($numero1 == $numero2) {
            echo "Los números deben ser distintos.";
        } else {
            $inicio = min($numero1, $numero2);
            $fin = max($numero1, $numero2);
            for ($i = $inicio; $i <= $fin; $i += 7) {
                echo "$i ";
            }
        }
    } else {
        echo "Por favor, introduce ambos números enteros.";
    }
    ?>