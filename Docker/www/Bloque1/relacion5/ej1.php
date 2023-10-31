<?php

$tamaño = 20;

$numero = array();
$cuadrado = array();
$cubo = array();

for ($i = 0; $i < $tamaño; $i++){
    $numero[$i] = rand(0, 100);
}

for ($i = 0; $i < $tamaño; $i++){
    $cuadrado[$i] = $numero[$i] * $numero[$i];
    $cubo[$i] = $numero[$i] * $numero[$i] * $numero[$i];
}

echo "<table border= 1>";
echo "  <tr>
            <th>Numero</th>
            <th>Cuadrado</th>
            <th>Cubo</th>
        </tr>
        ";
for ($i = 0; $i < $tamaño; $i++){
    echo "  <tr>
                <td>{$numero[$i]}</td>
                <td>{$cuadrado[$i]}</td>
                <td>{$cubo[$i]}</td>
            </tr>
            ";
}

?>