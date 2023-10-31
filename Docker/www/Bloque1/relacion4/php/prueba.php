<?php

$suma = isset($_POST["suma"]) ? $_POST["suma"] : 0;
$contador = isset($_POST["contador"]) ? $_POST["contador"] : 0;
$terminado = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero = intval($_POST['numero']);

    if ($numero < 0){
        $terminado = true; 
    }else {
        $suma += $numero;
        $contador++;
    }
}
echo "<h1>Calcular la media de números positivos</h1>";

if (!$terminado) {
    echo "<p>Introduce números positivos (termina con un número negativo).</p>";
    echo "<form action='prueba.php' method='POST'>";
    echo "<label for='numero'>Número:</label>";
    echo "<input type='number' name='numero' id='numero' required>";
    echo "<input type='hidden' name='suma' id='suma' value=\"$suma\">";
    echo "<input type='hidden' name='contador' id='contador' value=\"$contador\">";
    if ($contador > 0) {
        $media = $suma / $contador;
        echo "<input type='hidden' name='media' id='media' value=\"$media\">";
    }
    echo "<br>";
    echo "<input type='submit' value='Agregar Número'>";
    echo "</form>";
    echo "<br>";
    echo "La media de los números es: $media";

}

if($terminado){
    $media = $suma / $contador;
    echo "<h2>Finalizado</h2>";
    echo "La media de los números es: $media";
}

?>
