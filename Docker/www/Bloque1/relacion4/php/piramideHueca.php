<?php
    if (!empty($_POST['altura']) && !empty($_POST['imagen'])) {
        $altura = $_POST['altura'];
        $imagen = $_POST['imagen'];

        for ($i = 1; $i <= $altura; $i++) {
            for ($j = 1; $j <= ($altura - $i); $j++) {
                echo "&nbsp;&nbsp;";
            }
            for ($j = 1; $j <= (2 * $i - 1); $j++) {
                if ($j == 1 || $j == (2 * $i - 1)) {
                    echo "<img src='../img/$imagen.png' width='30' height='30'>";
                } else {
                    echo "&nbsp;&nbsp;";
                }
            }
            echo "<br>";
        }
    } else {
        echo "Por favor, introduce la altura y selecciona una imagen.";
    }
    ?>