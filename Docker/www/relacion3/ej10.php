<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Descubre tu horóscopo</h1>
    <form action="horoscopo.php" method="POST">
        <label for="dia">Día de nacimiento:</label>
        <input type="number" name="dia" id="dia" min="1" max="31" required>
        <br>
        <label for="mes">Mes de nacimiento:</label>
        <select name="mes" id="mes" required>
            <option value="1">Enero</option>
            <option value="2">Febrero</option>
            <option value="3">Marzo</option>
            <option value="4">Abril</option>
            <option value="5">Mayo</option>
            <option value="6">Junio</option>
            <option value="7">Julio</option>
            <option value="8">Agosto</option>
            <option value="9">Septiembre</option>
            <option value="10">Octubre</option>
            <option value="11">Noviembre</option>
            <option value="12">Diciembre</option>
        </select>
        <br>
        <br>
        <input type="submit" value="Descubrir horóscopo">
    </form>
</body>
</html>