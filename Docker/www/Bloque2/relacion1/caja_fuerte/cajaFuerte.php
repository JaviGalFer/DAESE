<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Caja Fuerte</title>
</head>
<body>
    <h1>Caja Fuerte</h1>
    
    <?php
    // Combinación correcta
    $combinacionCorrecta = "1234";
    
    // Verificar si se ha enviado el formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtener la combinación ingresada por el usuario
        $combinacionIngresada = $_POST["combinacion"];
        
        // Obtener el número de intentos restantes
        $intentos = $_POST["intentos"];
        
        if ($combinacionIngresada == $combinacionCorrecta) {
            echo "<p>La caja fuerte se ha abierto satisfactoriamente.</p>";
        } else {
            $intentos--;
            if ($intentos > 0) {
                echo "<p>Lo siento, esa no es la combinación. Te quedan $intentos intentos.</p>";
            } else {
                echo "<p>Agotaste todos los intentos. La caja fuerte está bloqueada.</p>";
            }
        }
    } else {
        // Inicializar el número de intentos
        $intentos = 4;
    }
    ?>

    <form method="POST" action="cajaFuerte.php">
        <label for="combinacion">Ingresa la combinación (4 cifras):</label>
        <input type="text" name="combinacion" maxlength="4" pattern="\d{4}" required>
        <input type="hidden" name="intentos" value="<?php echo $intentos; ?>">
        <br>
        <input type="submit" value="Abrir Caja Fuerte">
    </form>
</body>
</html>
