<?php
include ("../dbconnect.php");



    $estado = $_POST['estado'];
    $lote = $_POST['lote'];
    $cantidad = $_POST['cantidad_usada'];
    $almacen = $_POST['almacen'];

    $strlote = strtok($lote, " ");
    $stralmacen = strtok($almacen, " ");

    $consultaprecio = mysqli_query($connect,"SELECT precio FROM materia_prima INNER JOIN  lote ON materia_prima.tipo_mp = lote.tipo_mp WHERE codigo_lote = '$lote'");
    while($precio = mysqli_fetch_array($consultaprecio)){$calculoprecio = $cantidad * $precio[0]; $porciento = ($calculoprecio * 20)/ 100; $preciomueble = $calculoprecio + $porciento; }




if($estado === 'vendido'){
    $fecha_venta= date('Y-m-d', time());
}
else{
    $fecha_venta = '0000-00-00';
}


$insert = "INSERT INTO mueble (fecha_terminacion, estado, fecha_venta, precio, lote_usado, cant_mp_usada, almacen) VALUES (CURRENT_DATE ,'$estado','$fecha_venta','$preciomueble', '$lote', '$cantidad', '$stralmacen')";
$ejecutar = mysqli_query($connect,$insert);

if (!$ejecutar){
    echo "<script>alert('No se guardo el mueble')</script>";
}

else{
    echo '<script>window.location = "../../gestionmueble.php"</script>';
}

$connect->close();