<?php
session_start();

if(isset($_SESSION['visitas'])) {
    $_SESSION['visitas']++;
} else {
    $_SESSION['visitas'] = 1;
}

$contador = $_SESSION['visitas'];

?>

<!DOCTYPE html>
<html>
<head>
    <title>Contador de Visitas</title>
</head>
<body>
    <h1>Bienvenido a mi página</h1>
    <p>Esta página ha sido visitada <?php echo $contador; ?> veces.</p>
</body>
</html>
