<?php

include("php_bd/dbconnect.php");

if (isset($_POST["usuario"]) && isset($_POST["password"])){

$user = $_POST["usuario"];
setcookie("usuario",$user, 0);
$password = $_POST ["password"];
}

if (isset($_POST["login-button"])){

    $query = mysqli_query($connect,"SELECT * FROM usuario WHERE usuario = '$user' AND password = '$password'");
    $nr = mysqli_num_rows($query);

    if ($nr > 0){
        session_start();
        $_SESSION['usuario'] = $user;
        echo "<script>alert('Bienvenido .$user');window.location='index.php'</script>";


    }

    else{
        echo '<script>alert("El usuario o el password son invalidos"); location.href = "php_bd/login.php";</script>';
    }
}


?>