<?php
/** 
* Autor: Francisco Javier Gallego Fernández
* 
*/
//Incluimos el connect a la DB
include 'db_connect.php';

session_start();

$username = $_SESSION['username'];

//Verificamos la llegada del ID de la tarea
if(isset($_GET['id'])){
    $id = $_GET['id'];

    //Obtenemos los datos de la tarea
    

}

?>