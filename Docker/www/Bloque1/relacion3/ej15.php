<!DOCTYPE html>
<html>
<head>
    <title>Primera Cifra</title>
</head>
<body>
    <h2>Determina la primera cifra de un número entero (hasta 5 cifras)</h2>
    <form action="primeraCifra.php" method="post">
        <label for="numero">Introduce un número entero de hasta 5 cifras:</label>
        <input type="number" id="numero" name="numero" min="0" max="99999">
        <input type="submit" value="Calcular">
    </form>
</body>
</html>
