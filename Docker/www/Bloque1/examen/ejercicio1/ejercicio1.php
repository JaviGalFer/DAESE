<!-- 
    @author: Fco Javier Gallego Fernández
    curso: 2ºDAW
-->
<?php

for ($i = 1; $i < 100; $i++) {
    if ($i %5== 0 && $i %3== 0) {
        echo "FizzBuzz <br>";
    }elseif($i %5== 0) {
        echo "Buzz <br>";
    }elseif($i %3== 0) {
        echo "Fizz <br>";

    }else{
        echo "$i<br>";
    }
}

?>