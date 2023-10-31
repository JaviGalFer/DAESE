<?php
    if (!empty($_POST['base']) && !empty($_POST['exponente'])) {
        $base = $_POST['base'];
        $exponente = $_POST['exponente'];
        $potencia = pow($base, $exponente);
        echo "La potencia de $base elevado a $exponente es: $potencia";
    } else {
        echo "Por favor, introduce la base y el exponente.";
    }
    ?>