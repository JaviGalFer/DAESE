<?php
    if (!empty($_POST['numero'])) {
        $numero = $_POST['numero'];
        $numeroRevertido = 0;

        while ($numero > 0) {
            $digito = $numero % 10;
            $numeroRevertido = $numeroRevertido * 10 + $digito;
            $numero = (int)($numero / 10);
        }

        echo "<p>El número al revés es: $numeroRevertido</p>";
    } else {
        echo "Por favor, introduce un número.";
    }
?>