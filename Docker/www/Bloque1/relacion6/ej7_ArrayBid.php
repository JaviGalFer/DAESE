<?php

function generaArrayBiInt($filas, $columnas, $min, $max){
    $array = array();
    for ($i = 0; $i < $filas; $i++) {
        for ($j = 0; $j < $columnas; $j++) {
            $array[$i][$j] = rand($min, $max);
        }
    }
    return $array;
}

function filaDeArrayBiInt($array, $fila){
    return $array[$fila];
}

function columnaDeArrayBiInt($array, $columna){
    $columnaArray = array();
    foreach ($array as $fila) {
        $columnaArray[] = $fila[$columna];
    }
    return $columnaArray;
}

?>