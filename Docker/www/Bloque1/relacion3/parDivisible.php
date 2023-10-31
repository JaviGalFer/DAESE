<?php

$num = $_POST["num"];

if (($num % 2) == 0){
    echo "<h1>El número es par ";
}else{
    echo "<h1>El número no es par ";
}

if (($num % 5 == 0)){
    echo "y divisible entre 5</h1>";
}else{
    echo "y no es divisible entre 5</h1>";
}



?>