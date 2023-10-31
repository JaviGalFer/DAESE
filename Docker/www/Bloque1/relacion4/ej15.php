<!DOCTYPE html>
<html>
<head>
    <title>Potencias de un Número</title>
</head>
<body>
    <h2>Mostrar todas las potencias de un número base hasta un exponente dado</h2>
    <form action="./php/potencias.php" method="post">
        <label for="base">Introduce la base (número real):</label>
        <input type="number" step="any" id="base" name="base"><br><br>
        <label for="exponente">Introduce el exponente (entero positivo):</label>
        <input type="number" id="exponente" name="exponente"><br><br>
        <input type="submit" value="Mostrar Potencias">
    </form>
</body>
</html>
