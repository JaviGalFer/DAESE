<?php

$i = 0;

echo "<h1>Los múltiplos de 5 son: ";
for ($i = 0; $i <= 100; $i++){
    if ($i % 5 == 0){
        echo $i . " ";
    }
}
echo "</h1>";

?>