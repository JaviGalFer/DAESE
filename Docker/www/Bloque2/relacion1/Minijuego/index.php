<?php
/**
 * MiniJuego de cartas
 * @author Fco Javier Gallego Fernández
 */
session_start();

// Función para obtener una carta aleatoria
function obtenerCartaAleatoria() {
    $palos = ['c', 'd', 'p', 't'];
    $numeros = range(1, 10);

    $palo = $palos[array_rand($palos)];
    $numero = $numeros[array_rand($numeros)];

    return $palo . $numero . '.svg';
}

// Inicializar el juego si no hay cartas en sesión
if (!isset($_SESSION['carta_jugador1']) || !isset($_SESSION['carta_jugador2'])) {
    $_SESSION['carta_jugador1'] = obtenerCartaAleatoria();
    $_SESSION['carta_jugador2'] = obtenerCartaAleatoria();
}

// Determinar al ganador
if ($_SESSION['carta_jugador1'] > $_SESSION['carta_jugador2']) {
    $mensaje = "¡Jugador 1 gana!";
} elseif ($_SESSION['carta_jugador1'] < $_SESSION['carta_jugador2']) {
    $mensaje = "¡Jugador 2 gana!";
} else {
    $mensaje = "¡Empate!";
}


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minijuego de Cartas</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

    <h1>Minijuego de Cartas</h1>

    <div>
        <h2>Jugador 1</h2>
        <img src="cartas/<?php echo $_SESSION['carta_jugador1']; ?>" alt="Carta Jugador 1" width="100">
    </div>

    <div>
        <h2>Jugador 2</h2>
        <img src="cartas/<?php echo $_SESSION['carta_jugador2']; ?>" alt="Carta Jugador 2" width="100">
    </div>

    <p><?php echo $mensaje; ?></p>

    <form action="reiniciar.php" method="post">
        <input type="submit" value="Reiniciar Juego">
    </form>

</body>
</html>
