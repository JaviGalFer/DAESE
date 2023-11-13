<?php
/**
 * Página para reiniciar el MiniJuego de cartas
 * @author Fco Javier Gallego Fernández
 */
session_start();

// Reiniciar el juego generando nuevas cartas
$_SESSION['carta_jugador1'] = obtenerCartaAleatoria();
$_SESSION['carta_jugador2'] = obtenerCartaAleatoria();

// Redirigir al index.php
header('Location: index.php');
exit();

// Función para obtener una carta aleatoria
function obtenerCartaAleatoria() {
    $palos = ['c', 'd', 'p', 't'];
    $numeros = range(1, 10);

    $palo = $palos[array_rand($palos)];
    $numero = $numeros[array_rand($numeros)];

    return $palo . $numero . '.svg';
}
?>
