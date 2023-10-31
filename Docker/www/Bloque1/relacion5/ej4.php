<?php

$array = [];

if (isset($_POST["array"])){
    $array = explode(',', $_POST["array"]);
}else{
    for ($i = 0; $i < 100; $i++){
        $array[$i] = rand(0, 20);
    }
}


echo "
    <h1>Primer array</h1>
    <table border=1>"
;
        for ($i = 0; $i < 100; $i++) {
            echo "<td>" . $array[$i] . "</td>";
            if (($i + 1) % 10 == 0) {
            echo "</tr><tr>";
            }
        }
        echo "</tr></table>";


echo "
    <form method = \"post\">
        <input type = \"hidden\" name = \"array\" value = \"" . implode(',', $array) . "\"> <!-- se envía el array en un input oculto para mantener el anterior -->
        <label for = \"num1\">numero 1: 
            <input type = \"number\" name = \"numero1\" />
        </label>
        <label for = \"num2\">numero 2: 
            <input type = \"number\" name = \"numero2\" />
        </label>
        <input type = \"submit\" value = \"submit\" />
    </form>

    ";

if (isset($_POST['numero1']) && isset($_POST['numero2'])){
    $valor1 = $_POST['numero1'];
    $valor2 = $_POST['numero2'];

    for ($i = 0; $i < 100; $i++){
        if ($array[$i] == $valor1) {
            $array[$i] = $valor2;
        }
    }  

    echo "
        <h1>Array actualizado</h1>
        <table border=1>
    ";
        for ($i = 0; $i < 100; $i++) {
            echo "<td>" . $array[$i] . "</td>";
            if (($i + 1) % 10 == 0) {
                echo "</tr><tr>";
            }
        }
    echo "</tr></table>";

    

}


?>