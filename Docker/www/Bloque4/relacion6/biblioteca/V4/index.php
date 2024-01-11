<!-- BIBLIOTECA VERSIÓN 1
    Características de esta versión:
    - Código monolítico (sin arquitectura MVC)
    - Sin seguridad
    - Sin sesiones ni control de acceso
    - Sin reutilización de código
-->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
    <?php

    include_once("clases/Biblioteca.php");

    // Miramos el valor de la variable "action", si existe. Si no, le asignamos una acción por defecto
    if (isset($_REQUEST["action"])) {
        $action = $_REQUEST["action"];
    } else {
        $action = "mostrarListaLibros";  // Acción por defecto
    }

    $biblioteca = new Biblioteca();
    $biblioteca->$action();


    
    ?>

</body>

</html>