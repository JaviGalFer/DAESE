<!DOCTYPE html>
<html>
<head>
    <title>Contar Dígitos</title>
</head>
<body>
    <h2>Contar dígitos de un número entero (hasta 5 dígitos)</h2>
    <form action="contarDigit.php" method="post">
        <label for="numero">Introduce un número entero de hasta 5 dígitos:</label>
        <input type="number" id="numero" name="numero" min="-99999" max="99999">
        <input type="submit" value="Calcular">
    </form>
</body>
</html>
