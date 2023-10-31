<?php
    if (!empty($_POST['numero'])) {
        $numero = $_POST['numero'];
        $numeroInvertido = strrev((string) $numero); // Invertir el número convirtiéndolo a string
        if ((string) $numero === $numeroInvertido) {
            echo "El número " . $numero . " es capicúa.";
        } else {
            echo "El número " . $numero . " no es capicúa.";
        }
    } else {
        echo "Por favor, introduce un número entero.";
    }
    ?>