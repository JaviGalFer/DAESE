<?php

include 'ej1_funciones.php';
echo"
    <h1>Conversor de Decimal a Binario</h1>
    <p>Introduce un número Decimal</p>
    <form method=\"post\">
    <label for=\"decimal\" >Número decimal a convertir:
        <input type=\"number\" name=\"decimal\" required>
    </label>
    <input type=\"submit\" value=\"Enviar\" />
    </form>
";

if (isset($_POST["decimal"])) {
    $decimal = $_POST["decimal"];

    $binario = decimalABinario($decimal);

    echo "<p style='color: green; font-weight: bold;'>El número decimal $decimal en binario es: $binario</p>";
    
    
}

?>