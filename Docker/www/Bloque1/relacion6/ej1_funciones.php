<?php
// Biblioteca de Funciones

// Devuelve verdadero si el número es primo
function esPrimo($n){
    $esPrimo = true;
    for ($i = 2; $i < $n; $i++) {
        if ($n %2== 0) {
            $esPrimo = false;
        }
    }

    if (($n == 0) || ($n == 1)){
        $esPrimo = false;
    }
    return $esPrimo;
}

// Devuelve verdadero si el número es capicúa
function esCapicua($n){
    return $n == voltea($n);
}

// Devuelve el menor primo que es mayor al número que se pasa como parámetro
function siguientePrimo($n){
    $siguiente = $n + 1;
    while (true){
        if (esPrimo($siguiente)){
            return $siguiente;
        }
        $siguiente++;
    }
}

// Devuelve la potencia de los parámetros
function potencia($base, $exponente){
    return pow($base, $exponente);
}

// Cuenta el número de dígitos de un número entero
function digitos($n){
    return strlen((string)$n);
}

// Le da la vuelta a un número
function voltea($n){
    return (int)strrev((string)$n); 
}

// Devuelve el dígito que está en la posición n de un número entero.
// Se empieza contando por el 0 y de izquierda a derecha
// function digitoN($numero, $n){
//     $numeroRevertido = (string)voltea($n);
//     return (int)$numeroRevertido[$n];
// }
function digitoN($numero, $n){
    $numeroRevertido = (string)voltea($numero);
    if($n < strlen($numeroRevertido)){
        return (int)$numeroRevertido[$n];
    } else {
        return -1;
    }
}


// Da la posición de la primera ocurrencia de un dígito dentro de un número entero.
// Si no se encuentra devuelve -1
function posicionDeDigito($n, $digito){
    $numeroString = (string)$n;
    $posicion = strpos($numeroString, (string)$digito);
    if ($posicion === false) {
        return -1;
    }else {
        return $posicion;
    }
}

// Le quita a un número n digitos por detrás(Por la derecha)
function quitarPorDetras($n, $digito){
    return (int)substr((string)$n, 0, -1 * $n);
}

// Le quita a un número n digitos por delante(Por la izquierda)
function quitarPorDelante($n, $digito){
    $numeroString = (string)$n;
    return (int)substr($numeroString, $n);
}

// Añade un dígito a un número por detrás
function pegaPorDetras($n, $digito){
    return (int)($n . $digito);
}

// Añade un dígito a un número por delante
function pegaPorDelante($n, $digito){
    return (int)($digito . $n); 
}

// Toma como parámetros las posiciones inicial y final dentro de un número
// Y devuelve el trozo correspondiente
function trozoDeNumero($n, $inicio, $fin){
    $numeroString = (string)$n;    
    return (int)substr($numeroString, $inicio, $fin - $inicio + 1);
}

// Pega dos números para formar uno
function junstaNumeros($numero1, $numero2){
    return (int)($numero1 . $numero2);
}

// Función que convierte de binario a decimal
function binarioADecimal($binario){
    $decimal = 0;
    $longitud = digitos($binario);

    for ($i = 0; $i < $longitud; $i++) {
        $digito = digitoN($binario, $i);
        $decimal += $digito * potencia(2, $i);
    }

    return $decimal;
}

// Función que convierte un número decimal a binario
function decimalABinario($decimal){
    $binario = "";
    while($decimal > 0){
        $binario = (string)($decimal % 2) . $binario;
        $decimal = (int)($decimal / 2);
    }
    return (int)$binario;
}


?>