<!DOCTYPE html>
<html>
<head>
    <title>Números no Divisibles</title>
</head>
<body>
    <h2>Números enteros no divisibles menores a un número dado</h2>
    <form action="./php/menoresDado.php" method="post">
        <label for="limite">Introduce un límite:</label>
        <input type="number" id="limite" name="limite" min="1">
        <br><br>
        <label for="divisor">Introduce un divisor:</label>
        <input type="number" id="divisor" name="divisor" min="1">
        <br><br>
        <input type="submit" value="Mostrar Números">
    </form>
</body>
</html>
