<?php

$i = 0;

echo "<h1>Los múltiplos de 5 son: ";
while ($i <= 100){
    if ($i % 5 == 0){
        echo $i . " ";
    }
    $i++;
}
echo "</h1>";

?>