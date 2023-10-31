<?php
$diccionario = array(
    "casa" => "house",
    "perro" => "dog",
    "gato" => "cat",
    "libro" => "book",
    "manzana" => "apple",
    "naranja" => "orange",
    "rojo" => "red",
    "verde" => "green",
    "azul" => "blue",
    "amarillo" => "yellow",
    "bueno" => "good",
    "malo" => "bad",
    "grande" => "big",
    "pequeño" => "small",
    "hombre" => "man",
    "mujer" => "woman",
    "niño" => "child",
    "comer" => "eat",
    "beber" => "drink",
    "dormir" => "sleep"
);

echo"
    <h1>Diccionario</h1>
    <p>Introduce una palabra en Español</p>
    <form method=\"post\">
    <label for=\"palabra\" >Palabra a traducir:
        <input type=\"text\" name=\"palabra\"/>
    </label>
    <input type=\"submit\" value=\"Enviar\" />
    </form>
";

if (isset($_POST["palabra"]) && !empty($palabra)){

    $palabra = strtolower($_POST["palabra"]);

    $encontrado = false;

    foreach ($diccionario as $key => $value) {
        $key = strtolower($key);
        if ($key == $palabra) {
            echo "<h2 style=\"color: rgb(0, 199, 17); font-weight: bold;\">". strtoupper($key) . " = " . strtoupper($value) . "</h2>";
            $encontrado = true;
            break;
        }
    }

    if (!$encontrado) {
        echo "<p style=\"color: red; font-weight: bold;\">La palabra ". strtoupper($palabra) . " no se encuentra en el diccionario</p>";
    }

}else{
    echo "<br>";
    echo "<p style=\"color: red; font-weight: bold;\">Introduce una palabra</p>";
}

?>