<?php
$numeros = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    for($i = 1; $i <= 4; $i++){
        $numero = $_POST["numero$i"];
        $numeros[] = $numero;
    }

    $maximo = max($numeros);
    $minimo = min($numeros);

    echo "<p>Los números ingresados son: </p><br>";
    foreach ($numeros as $numero){
        if ($numero == $maximo){
            echo "$numero (maximo)";
        }elseif ($numero == $minimo){
            echo "$numero (minimo)";
        }else{
            echo "$numero";
        }
        echo "<br>";
    }
}

?>