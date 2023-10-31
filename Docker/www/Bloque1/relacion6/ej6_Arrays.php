<?php

function generaArrayInt($tamaño, $minimo, $maximo){

    $array = array();

    for ($i= 0; $i < $tamaño; $i++){
        $array[] = rand($minimo, $maximo);
    }
    return $array;
}

function minimoArrayInt($array){    
    return min($array);
}

function maximoArrayInt($array){
    return max($array);
}

function mediaArrayInt($array){
    return array_sum($array) / count($array);
}

function estaEnArrayInt($numero, $array){
    return in_array($numero, $array);
}

function posicionEnArray($numero, $array){
    return array_search($numero, $array);
}

function volteaArrayInt($array){
    return array_reverse($array);
}

function rotaDerechaArrayInt($array, $n){
    $length = count($array);
    $n = $n % $length;
    return array_merge(array_slice($array, $length - $n), array_slice($array, 0, $length - $n));
}

function rotaIzquierdaArrayInt($array, $n){
    $length = count($array);
    $n = $n % $length;
    return array_merge(array_slice($array, $n), array_slice($array, 0, $n));
}

?>