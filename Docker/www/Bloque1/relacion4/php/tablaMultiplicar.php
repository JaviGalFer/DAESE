<?php
    // Obtén el número ingresado desde el formulario
    
    $numero = $_POST['numero'];

    echo "<h1>Tabla de multiplicar del $numero</h1>";
    echo "<table border='1'>";
    echo "<tr><th>Multiplicador</th><th>Resultado</th></tr>";

    for ($i = 1; $i <= 10; $i++) {
        $resultado = $numero * $i;
        echo "<tr><td>$numero x $i</td><td>$resultado</td></tr>";
    }

    echo "</table>";
    
?>