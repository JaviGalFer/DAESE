<?php

$digito = $_POST['numero'];

$numero = $digito;

$sum = 0;

while ($numero > 0){
    $numero = floor($numero / 10);
    $sum++;
}

echo "<h1>El número $digito tiene $sum dígitos.</h1>";

?>