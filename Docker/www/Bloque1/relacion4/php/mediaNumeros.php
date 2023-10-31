<?php
    // Inicializa variables para calcular la media y el contador de números
    $suma = 0;
    $contador = 0;
    $terminado = false;

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Obtiene el número ingresado
        $numero = intval($_POST['numero']);

        // Verifica si es negativo
        if ($numero < 0) {
            $terminado = true; // Indica que se ha terminado la entrada
        } else {
            // Acumula el número en la suma
            $suma += $numero;

            // Incrementa el contador
            $contador++;
        }
    }

    // Muestra el formulario para ingresar números
    echo "<h1>Calcula la media de números positivos</h1>";
    echo "<p>Introduce números positivos (termina con un número negativo).</p>";

    if (!$terminado) {
        echo "<form action='mediaNumeros.php' method='POST'>";
        echo "<label for='numero'>Número:</label>";
        echo "<input type='number' name='numero' id='numero' required>";
        echo "<input type='hidden' ";
        echo "<br>";
        echo "<input type='submit' value='Agregar Número'>";
        echo "</form>";
    }
    echo $contador;
    if ($terminado) {
        // Calcula la media
        if ($contador > 0) {
            $media = $suma / $contador;
            echo "<h2>La media de los números ingresados es: $media</h2>";
        } else {
            echo "<h2>No se han ingresado números positivos.</h2>";
        }
    }
    ?>