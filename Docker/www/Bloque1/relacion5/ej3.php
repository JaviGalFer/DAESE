<?php

$aleatorios = array();
$rotao = array();
$tamaño = 15;

for ($i = 0; $i < $tamaño; $i++){
    $aleatorios[$i] = rand(0, 100);
}

for ($i = 0; $i < $tamaño; $i++) {
    $rotao[($i + 1) % $tamaño] = $aleatorios[$i];
}

echo "Array Original: " . implode(", ", $aleatorios) . "<br>";
echo "Array Rotado: " . implode(", ", $rotao);


?>