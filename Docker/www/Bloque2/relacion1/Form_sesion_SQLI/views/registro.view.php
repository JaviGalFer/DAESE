<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="./views/css/registro.css">
</head>
<body>
    <div class="container">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" name="login">
            <input type="text" name="usuario" placeholder="Usuario">
            <input type="password" name="password" placeholder="Password">
            <input type="password" name="password2" placeholder="Repite Password">
            <input type="submit" value="Aceptar">
        </form>
        <?php 
        if (!empty($mensajeError)) {
            echo "<p class='error-message'>$mensajeError</p>";
        }
        ?>
    </div>
    <div class="bottom-content">
        <p>¿Tienes cuenta?</p>
        <a href="login.php">Inicia sesión</a>
    </div>
</body>
</html>