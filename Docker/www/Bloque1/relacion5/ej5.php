<?php

$array = [];

for ($i = 0; $i < 8; $i++){
    $array[$i] = rand(0, 100);
}

foreach ($array as $numero) {
    if ($numero % 2 == 0) {
        echo "<p style='color: blue;'>$numero</p>"; // Colorea los números pares de azul.
    } else {
        echo "<p style='color: red;'>$numero</p>"; // Colorea los números impares de rojo.
    }
}


?>