<?php
    if (!empty($_POST['numero'])) {
        $numero = $_POST['numero'];
        echo "<table border='1'>
                <tr>
                    <th>Número</th>
                    <th>Cuadrado</th>
                    <th>Cubo</th>
                </tr>";
        for ($i = $numero; $i < $numero + 5; $i++) {
            $cuadrado = $i * $i;
            $cubo = $i * $i * $i;
            echo "<tr>
                    <td>{$i}</td>
                    <td>{$cuadrado}</td>
                    <td>{$cubo}</td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "Por favor, introduce un número entero.";
    }
    ?>