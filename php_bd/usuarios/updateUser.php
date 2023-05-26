<?php
include ("../dbconnect.php");

if (isset($_POST['edit-id_usuario'])&& isset($_POST['edit-nombre']) && isset($_POST['edit-apellido1'])&& isset($_POST['edit-apellido2'])&& isset($_POST['edit-usuario'])) {

    $id_usuario = $_POST['edit-id_usuario'];
    $nombre = $_POST['edit-nombre'];
    $apellido1 = $_POST['edit-apellido1'];
    $apellido2 = $_POST['edit-apellido2'];
    $usuario = $_POST['edit-usuario'];
}

$update = "UPDATE usuario SET nombre = '$nombre', apellido1 = '$apellido1', apellido2 = '$apellido2', usuario = '$usuario' WHERE id_usuario = '$id_usuario'";
$ejecutar = mysqli_query($connect,$update);

if (!$ejecutar){
    echo "<script>alert('No se actualizo el registro')</script>";

}

else{
    echo '<script>window.location = "../../gestion/gestionusuarios.php"</script>';
}

$connect->close();