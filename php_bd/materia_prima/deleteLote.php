<?php
include ("../dbconnect.php");

if (isset($_POST['delete-codigo_lote'])) {
    $codigo_lote = $_POST['delete-codigo_lote'];
}

$delete = "DELETE FROM lote WHERE codigo_lote = '$codigo_lote'";
$ejecutar = mysqli_query($connect,$delete);

if (!$ejecutar){
    echo "<script>alert('Fallo la eliminacion del registro')</script>";
}

else{
    echo '<script>window.location = "../../gestion/gestionmaterial.php"</script>';
}

$connect->close();