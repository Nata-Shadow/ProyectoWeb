<?php

include ("../dbconnect.php");

if (isset($_POST['delete-id_usuario'])) {

    $id_usuario = $_POST['delete-id_usuario'];

}

$delete = "DELETE FROM usuario WHERE id_usuario = '$id_usuario'";
$ejecutar = mysqli_query($connect,$delete);

if (!$ejecutar){
    echo "<script>alert('Fallo la eliminacion del registro')</script>";

}

else{
    echo '<script>window.location = "../../gestion/gestionusuarios.php"</script>';
}

$connect->close();