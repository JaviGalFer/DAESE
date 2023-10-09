<?php

$num1 = rand (1,6);
$num2 = rand (1,6);
$jugador1 = $num1 + $num2;
$num3 = rand (1,6);
$num4 = rand (1,6);
$jugador2 = $num3 + $num4;

echo "<img src=\"./img/" . $num1 . ".svg\" />";
echo "<img src=\"./img/" . $num2 . ".svg\" />";
echo "<h1>El jugador 1 ha sacado: " . $jugador1 . "</h1> <br>";


echo "<img src=\"./img/" . $num3 . ".svg\" />";
echo "<img src=\"./img/" . $num4 . ".svg\" />";
echo "<h1>El jugador 2 ha sacado: " . $jugador2 . "</h1> <br>";

if ($jugador1 == $jugador2){
    echo "<h1>Empate</h1>";
    }elseif ($jugador1 > $jugador2){
        echo "<h1>EL jugador 1 gana</h1>";
    }else{
        echo "<h1>El jugador 2 gana</h1>";
    }


?>