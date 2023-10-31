<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Ordenar los números</h1>
    <form action="ordenar.php" method="POST">
        <label for="horas">Primer número:</label>
        <input type="number" name="num1" id="num1" required>
        <br>
        <label for="minutos">Segundo número:</label>
        <input type="number" name="num2" id="num2" required>
        <br>
        <label for="minutos">Tercer número:</label>
        <input type="number" name="num3" id="num3" required>
        <br>
        <br>
        <input type="submit" value="Ordenar">
    </form>
</body>
</html>