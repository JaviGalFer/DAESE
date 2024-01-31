<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <?php
         // Extrae el contenido de $data
        extract($data);
        // Incluir el archivo CSS dinámicamente
        if (isset($cssFile)) {
            echo '<link rel="stylesheet" href="./views/css/' . $cssFile . '">';
        } else {
            echo '<link rel="stylesheet" href="./views/css/styles.css">';
        }
    ?>
</head>

<body>
    