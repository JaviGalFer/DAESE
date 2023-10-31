<?php

$i = 0;

echo "<h1>Los múltiplos de 5 son: ";
do{
    if ($i % 5 == 0){
        echo $i . " ";
    }
    $i++;
} while ($i <= 100);
echo "</h1>";

?>