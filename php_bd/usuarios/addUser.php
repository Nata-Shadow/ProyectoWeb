<?php

include ("../dbconnect.php");



if (isset($_POST['nombre']) && isset($_POST['apellido1'])&& isset($_POST['apellido2'])&& isset($_POST['usuario'])&& isset($_POST['password'])){
    $nombre = $_POST['nombre'];
    $apellido1 = $_POST['apellido1'];
    $apellido2 = $_POST['apellido2'];
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
}


$verificar = mysqli_query($connect,"SELECT * FROM usuario WHERE usuario = '$usuario'");

$r = mysqli_num_rows($verificar);

if($r > 0){
    echo '<script>alert("El usuario ya existe"); window.location = "../../gestionusuarios.php"</script>';
    exit;
}

$insert = "INSERT INTO usuario (nombre, apellido1, apellido2, usuario, password) VALUES ('$nombre','$apellido1','$apellido2','$usuario','$password')";
$ejecutar = mysqli_query($connect,$insert);

if (!$ejecutar){
    echo "<script>alert('No se ingreso el registro')</script>";
}

else{
    echo '<script>window.location = "../../gestionusuarios.php"</script>';
}


$connect->close();