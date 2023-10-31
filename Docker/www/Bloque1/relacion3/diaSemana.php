<?php

$semana = $_POST["num1"]; 

switch($semana) {
    case 1:
        echo "<h1>Lunes</h1>";
        break;
    case 2:
        echo "<h1>Martes</h1>";
        break;
    case 3:
        echo "<h1>Miercoles</h1>";
        break;
    case 4:
        echo "<h1>Jueves</h1>";
        break;
    case 5:
        echo "<h1>Viernes</h1>";
        break;
    case 6:
        echo "<h1>Sabado</h1>";
        break;
    case 7:
        echo "<h1>Domingo</h1>";
        break;
}

?>