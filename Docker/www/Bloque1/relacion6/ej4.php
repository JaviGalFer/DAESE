<?php
include 'ej1_funciones.php';
echo"
    <h1>Conversor de Binario a Decimal</h1>
    <p>Introduce un número binario</p>
    <form method=\"post\">
    <label for=\"binario\" >Número binario a convertir (Sólo 0 y 1):
        <input type=\"text\" name=\"binario\"/ pattern=\"[01]+\ title=\"Por favor, introduzca solo números 0 y 1\" required>
    </label>
    <input type=\"submit\" value=\"Enviar\" />
    </form>
";

if (isset($_POST["binario"])) {
    $binario = $_POST["binario"];

    if(preg_match('/^[01]+$/', $binario)) {
    $decimal = binarioADecimal($binario);

    echo "<p style='color: green; font-weight: bold;'>El número binario $binario en decimal es: $decimal</p>";
    }else {
        echo "<p style='color: red; font-weight: bold;'>Error: Por favor, introduzca solo números 0 y 1</p>";
    }
}

?>