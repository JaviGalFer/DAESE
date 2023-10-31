<?php
    if (!empty($_POST['numero']) && !empty($_POST['digito'])) {
        $numero = $_POST['numero'];
        $digito = $_POST['digito'];
        $posiciones = [];
        $posicion = 1;

        while ($numero > 0) {
            $ultimoDigito = $numero % 10;
            if ($ultimoDigito == $digito) {
                $posiciones[] = $posicion;
            }
            $posicion++;
            $numero = (int)($numero / 10);
        }

        if (count($posiciones) > 0) {
            echo "<p>El dígito $digito se encuentra en la(s) posición(es): " . implode(", ", array_reverse($posiciones)) . "</p>";
        } else {
            echo "<p>El dígito $digito no se encuentra en el número.</p>";
        }
    } else {
        echo "<p>Por favor, introduce un número y un dígito a buscar.</p>";
    }
?>