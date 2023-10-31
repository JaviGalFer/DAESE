<?php
    if (!empty($_POST['numero'])) {
        $numero = $_POST['numero'];
        $cantidadDigitos = strlen((string) abs($numero)); // Convierte a string y cuenta la longitud

        echo "El número ingresado es: " . $numero . "<br>";
        echo "El número tiene " . $cantidadDigitos . " dígitos.";
    } else {
        echo "Por favor, introduce un número entero.";
    }
    ?>