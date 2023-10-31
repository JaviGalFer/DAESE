<?php
session_start();

if(isset($_POST['reset'])) {
    header("location: pagina.php");
    $_SESSION['visitas'] = 0;
} else {
    if(isset($_SESSION['visitas'])) {
        $_SESSION['visitas']++;
    } else {
        $_SESSION['visitas'] = 1;
    }
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
    <form method="post">
        <input type="submit" name="reset" value="Reiniciar Contador">
    </form>

</body>
</html>
