<?php

$numero1 = $_POST["num1"];
$numero2 = $_POST["num2"];
$numero3 = $_POST["num3"];

$temp = 0;

if ($numero1 < $numero2) {
    $temp = $numero2;
    $numero2 = $numero1;
    $numero1 = $temp;
}
if ($numero2 < $numero3) {
    $temp = $numero3;
    $numero2 = $numero3;
    $numero3 = $temp;
}
if ($numero1 < $numero2) {
    $temp = $numero2;
    $numero2 = $numero1;
    $numero1 = $temp;
}


echo "<h1>Números ordenados: $numero1, $numero2, $numero3</h1>";
?>