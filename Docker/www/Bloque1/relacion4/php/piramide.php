<?
    if (isset($_POST["altura"])) {
        $altura = $_POST["altura"];
        $imagen = $_POST["imagen"];

        $img_size = "30px";
        $img_tag = "<img src = \"../img/$imagen.png\" alt = \"$imagen\" width = \"$img_size\" height = \"$img_size\" />";

        for ($i = 1; $i <= $altura; $i++) {
        for ($j = 1; $j <= $altura - $i; $j++) {
            echo "&nbsp;&nbsp;&nbsp;&nbsp;"; // se generan los espacios correspondientes
        }

        for ($j = 1; $j <= $i; $j++) {
            echo $img_tag;
        }
        
        echo "<br />";
        }
    }
?>
