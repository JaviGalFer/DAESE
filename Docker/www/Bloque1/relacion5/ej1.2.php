<?php

$tamaño = 20;

$datos = array();

for ($i = 0; $i < $tamaño; $i++) {
    $numero = rand(0, 100);
    $cuadrado = $numero * $numero;
    $cubo = $numero * $numero * $numero;

    $datos[] = array(
        'Numero' => $numero,
        'Cuadrado' => $cuadrado,
        'Cubo' => $cubo
    );
}

echo "<table border=1>";
echo "<tr>
        <th>Numero</th>
        <th>Cuadrado</th>
        <th>Cubo</th>
    </tr>";

foreach ($datos as $dato) {
    echo "<tr>
            <td>{$dato['Numero']}</td>
            <td>{$dato['Cuadrado']}</td>
            <td>{$dato['Cubo']}</td>
        </tr>";
}

echo "</table>";

?>
