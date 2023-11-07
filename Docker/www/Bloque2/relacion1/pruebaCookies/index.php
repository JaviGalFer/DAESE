<?php

    if (!isset($_COOKIE['usuario'])){
        setcookie('usuario', 'Pedro', time() + 36);
    }else{
        echo $_COOKIE['usuario'];
    }

    

?>