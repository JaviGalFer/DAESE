<?php
    if (!empty($_POST['numero'])) {
        $numero = $_POST['numero'];
        $ultimaCifra = abs($numero) % 10; // Obtenemos el valor absoluto para manejar números negativos

        echo "El número ingresado es: " . $numero . "<br>";
        echo "La última cifra es: " . $ultimaCifra;
    } else {
        echo "Por favor, introduce un número entero.";
    }
    ?>