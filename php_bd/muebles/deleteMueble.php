<?php
include ("../dbconnect.php");

if (isset($_POST['delete-codigo_mueble'])) {
    $codigo_mueble = $_POST['delete-codigo_mueble'];
}

$delete = "DELETE FROM mueble WHERE codigo_mueble = '$codigo_mueble'";
$ejecutar = mysqli_query($connect,$delete);

if (!$ejecutar){
    echo "<script>alert('Fallo la eliminacion del registro')</script>";
}

else{
    echo '<script>window.location = "../../gestion/gestionmueble.php"</script>';
}

$connect->close();