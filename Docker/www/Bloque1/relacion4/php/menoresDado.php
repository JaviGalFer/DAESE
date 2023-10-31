<?php
    if (!empty($_POST['limite']) && !empty($_POST['divisor'])) {
        $limite = $_POST['limite'];
        $divisor = $_POST['divisor'];

        echo "<p>Los números enteros no divisibles por $divisor y menores a $limite son:</p>";

        for ($i = 1; $i < $limite; $i++) {
            if ($i % $divisor !== 0) {
                echo "$i, ";
            }
        }
    } else {
        echo "<p>Por favor, introduce un límite y un divisor.</p>";
    }
?>