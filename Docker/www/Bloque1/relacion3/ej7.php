<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
    <form action="media.php" method="post">
        <h1>Nota media</h1>
        Introduce el valor de la primera nota: <input type="number" name="num1" id="num1" min="0" max="10" required><br> 
        Introduce el valor de la segunda nota: <input type="number" name="num2" id="num2" min="0" max="10" required><br> 
        Introduce el valor de la tercera nota: <input type="number" name="num3" id="num3" min="0" max="10" required><br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>