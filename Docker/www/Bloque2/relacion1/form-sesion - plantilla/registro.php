<?
/**
 * En esta página se encuentra el código que crea el usuario. Por ahora no se hace la conexión a BD, simplemente si el usuario introducido en el formulario 
 * es test/test se redirige a la página de login. En otro caso se indicará que el usuario es incorrecto.
 *  
 * Al recuperar la password automáticamente se le aplicará un cifrado sha512.
 * 
 * Autor: Nombre Apellidos
 * 
 */

$mensaje = "El usuario es incorrecto.";
header('Refresh: 3; URL=index.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Error de Usuario</title>
</head>
<body>
    <h1>Error de Usuario</h1>
    <p><?php echo $mensaje; ?></p>
</body>
</html>