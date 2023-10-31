<?php
include 'ej1_funciones.php';

for ($i = 1; $i <=99999; $i++) {
    if(esCapicua($i)) {
        echo $i . ", ";
    }
}

?>