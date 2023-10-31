<?php
    if (!empty($_POST['numero'])) {
        $numero = $_POST['numero'];
        $primeraCifra = substr((string) $numero, 0, 1); // Convierte a string y toma el primer carácter

        echo "El número ingresado es: " . $numero . "<br>";
        echo "La primera cifra es: " . $primeraCifra;
    } else {
        echo "Por favor, introduce un número entero.";
    }
    ?>