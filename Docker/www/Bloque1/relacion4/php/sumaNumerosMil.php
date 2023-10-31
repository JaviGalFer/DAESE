<?php
    if (!empty($_POST['numero'])) {
        $total = isset($_POST["total"]) ? $_POST["total"] : 0;
        $contador = isset($_POST["contador"]) ? $_POST["contador"] : 0;
        $media = isset($_POST["media"]) ? $_POST["media"] : 0;

        while ($total <= 10000) {
            $numero = $_POST['numero'];
            $total += $numero;
            $contador++;
            $media = $total / $contador;

            if ($total > 10000) {
                break;
            }

            echo "<p>Total acumulado: $total</p>";
            echo "<p>Contador de números introducidos: $contador</p>";
            echo "<p>Media: $media</p>";

            echo    "<form action='sumaNumerosMil.php' method='post'>
                    <label for='numero'>Introduce un número:</label>
                    <input type='number' id='numero' name='numero'>
                    <input type='hidden' name='total' value='$total'>
                    <input type='hidden' name='contador' value='$contador'>
                    <input type='hidden' name='media' value='$media'>
                    <input type='submit' value='Agregar'>
                    </form>";
            exit;
        }

        echo "<p>Total acumulado: $total</p>";
        echo "<p>Contador de números introducidos: $contador</p>";
        echo "<p>Media: $media</p>";
    } else {
        echo "<p>Por favor, introduce al menos un número.</p>";
    }
    ?>