<!DOCTYPE html>
<html>
<head>
    <title>Pirámide con Imágenes</title>
</head>
<body>
    <h2>Construir una pirámide con la imagen seleccionada</h2>
    <form action="./php/piramide.php" method="post">
        <label for="altura">Introduce la altura de la pirámide:</label>
        <input type="number" id="altura" name="altura" min="1">
        <br><br>
        <label for="imagen">Selecciona una imagen:</label>
        <select id="imagen" name="imagen">
            <option value="bolitas">Bolitas</option>
            <option value="ladrillo">Ladrillo</option>
            <option value="Mario">Super Mario</option>
            <option value="flecha">Flecha</option>
            <option value="Cepillo">Cepillo</option>
        </select>
        <br><br>
        <input type="submit" value="Construir Pirámide">
    </form>
</body>
</html>
