<?php
include ("../dbconnect.php");

if (isset($_POST['tipo_mp']) && isset($_POST['cantidad'])&& isset($_POST['celda'])){

    $tipo_mp = $_POST['tipo_mp'];
    $cantidad = $_POST['cantidad'];
    $celda = $_POST['celda'];

    $consultaprecio = mysqli_query($connect,"SELECT precio FROM materia_prima WHERE tipo_mp = '$tipo_mp'");
    while($precio = mysqli_fetch_array($consultaprecio)){$calculoprecio = $cantidad * $precio[0];}

    $strcelda = strtok($celda, " ");
}

$insert = "INSERT INTO lote (tipo_mp, cantidad, precio_lote, celda) VALUES ('$tipo_mp','$cantidad','$calculoprecio','$strcelda')";
$ejecutar = mysqli_query($connect,$insert);

if (!$ejecutar){
    echo "<script>alert('No se ingreso el registro')</script>";
}

else{
    echo '<script>window.location = "../../gestionmaterial.php"</script>';
}

$connect->close();