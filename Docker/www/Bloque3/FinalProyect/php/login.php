<?php
/** 
* Autor: Francisco Javier Gallego Fernández
* 
*/
//Incluimos el connect a la DB
include 'db_connect.php';
session_start();

if (isset($_POST['username']) && isset($_POST['password'])){

    $username = $_POST['username'];
    $password = hash('sha512', $_POST['password']);
    

    try{

        //Hacemos la consulta a la DB
        $statement = $conn->prepare('SELECT * FROM usuarios WHERE usuario = :username AND password = :password LIMIT 1');
        
        
        $statement->execute(array(':username' => $username, ':password' => $password));

        $resultado = $statement->fetch();

        if ($resultado) {
            $_SESSION['username'] = $username;
            header('Location: ../logueado.php');
        }else {
            echo "<script>alert('Usuario o contraseña incorrecto.');</script>";
            echo "<script>window.location = '../index.html';</script>";
        }
        
    }catch(PDOException $e){
        echo "Error: " . $e->getMessage();
    }

}
?>