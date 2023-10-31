<!-- 
    @author: Fco Javier Gallego Fernández
    curso: 2ºDAW
-->
<?php
    if (!empty($_POST['numero'])) {
        $numero = $_POST['numero'];
        $esPrimo = true;
        if ($numero > 1 && $numero < 1000) {
            echo "<h2>Números primos entre 1 y $numero:</h2>
            <a href=\"ejercicio3.php\">Volver al formulario</a>
            <p>";
            for ($i = $numero; $i <= 1000; $i++) {
                $esPrimo = true;
                for ($j = 2; $j <= $i / 2; $j++) {
                    if ($i % $j == 0) {
                        $esPrimo = false;
                        break;
                    }
                }
                if ($esPrimo) {
                    echo "$i <br>";
                }
            }
            echo "</p>";
        } else {
            echo    "<h3>Por favor, introduce un número entero entre 1 y 1000.</h3><br>
                    <a href=\"ejercicio3.php\">Volver al formulario</a>
        ";
            
        }
    } else {
        echo    "<h3>Por favor, introduce un número entero entre 1 y 1000.</h3><br>
                    <a href=\"ejercicio3.php\">Volver al formulario</a>
        ";
    }
    ?>
