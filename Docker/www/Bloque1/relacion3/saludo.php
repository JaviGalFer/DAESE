<?php

$hora = $_POST["num1"]; 

if ($hora >= 6 && $hora < 12) {
    echo "<h1>Buenos días</h1>";
} elseif ($hora >= 12 && $hora < 20) {
    echo "<h1>Buenas tardes</h1>";
} else {
    echo "<h1>Buenas noches</h1>";
}

?>