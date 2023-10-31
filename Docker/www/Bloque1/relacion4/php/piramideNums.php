<?php
    if (!empty($_POST['numero'])) {
        $altura = $_POST['numero'];
        $espacios = $altura;

        echo "<pre>";

        for ($i = 1; $i <= $altura; $i++) {
            for ($j = 1; $j <= $espacios; $j++) {
                echo " ";
            }
            $espacios--;

            for ($j = 1; $j <= $i; $j++) {
                echo "$j ";
            }
            echo "\n";
        }

        echo "</pre>";
    } else {
        echo "Por favor, introduce un número para la altura de la pirámide.";
    }
?>