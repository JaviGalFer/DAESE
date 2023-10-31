<?php
include 'ej1_funciones.php';

for ($i = 1; $i <=1000; $i++) {
    if(esPrimo($i)) {
        echo $i . ", ";
    }
}

?>