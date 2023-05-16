<?php
 include ("dbconnect.php");
 include ("functions.php");

 $grado = $_POST['grado'];
 $nombre = $_POST['nombre'];
 $departamento = $_POST['departamento'];
 $cargo = $_POST['cargo'];
 $numero = $_POST['numero'];

 $sql = "INSERT INTO propietario(grado,nombre,departamento,cargo,numero) VALUES ('$grado','$nombre','$departamento','$cargo','$numero')";
$result = mysqli_query($connect,$sql);

if (!$result){
    echo "<script>alert('No se ingreso el registro')</script>";
}

$connect->close();


