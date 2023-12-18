<?php

require_once 'clases/Ave.php';
require_once 'clases/Gato.php';
require_once 'clases/Perro.php';
require_once 'clases/Canario.php';
require_once 'clases/Pinguino.php';
require_once 'clases/Lagarto.php';

$gato = new Gato();
$gato->setNombre("Anacleto");

$perro = new Perro();
$perro->setNombre("Firulai");

$canario = new Canario();
$canario->setNombre("Pepe");

$pinguino = new Pinguino();
$pinguino->setNombre("Skipper");

$lagarto = new Lagarto();
$lagarto->setNombre("Ataulfo");

echo "Nombre del gato: " . $gato->getNombre() . "<br>";
echo $gato->hacerSonido() . "<br>";
echo $gato->moverse() . "<br>";
echo $gato->amamantar() . "<br><br>";

echo "Nombre del perro: " . $perro->getNombre() . "<br>";
echo $perro->hacerSonido() . "<br>";
echo $perro->moverse() . "<br>";
echo $perro->amamantar() . "<br><br>";

echo "Nombre del canario: " . $canario->getNombre() . "<br>";
echo $canario->hacerSonido() . "<br>";
echo $canario->moverse() . "<br>";
echo $canario->volar() . "<br><br>";

echo "Nombre del pingüino: " . $pinguino->getNombre() . "<br>";
echo $pinguino->hacerSonido() . "<br>";
echo $pinguino->moverse() . "<br>";
echo $pinguino->volar() . "<br><br>";

echo "Nombre del lagarto: " . $lagarto->getNombre() . "<br>";
echo $lagarto->hacerSonido() . "<br>";
echo $lagarto->moverse() . "<br>";
echo $lagarto->cambiarColor() . "<br>";
?>