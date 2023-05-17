<?php

include ("../php_bd/dbconnect.php");

$user = $_POST["usuario"];
$password = $_POST ["password"];

if (isset($_POST["login-button"])){
    $query = mysqli_query($connect,"SELECT * FROM usuario WHERE usuario = '$user' AND password = '$password'");
    $nr = mysqli_num_rows($query);

    if ($nr == 1){
        echo "<script>alert('Bienvenido: $user'); window.location='../index.php'</script>";
    }

    else{
        echo "<script>alert('Usuario no registrado');window.location='../login.php'</script>";
    }
}


?>