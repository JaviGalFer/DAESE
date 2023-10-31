<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
    <?php 
    
    $num1 = $_POST["num1"];
    $num2 = $_POST["num2"];
    $resultado = $num1 * $num2;

    echo "El resultado de " . $num1 . " por " . $num2 . " es: " . $resultado;
    
    
    ?>
</body>
</html>