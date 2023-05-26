<?php
include ("../dbconnect.php");

if (isset($_POST['edit-codigo_mueble']) && isset($_POST['edit-fecha_terminacion']) && isset($_POST['edit-estado'])&& isset($_POST['edit-fecha_venta'])&& isset($_POST['edit-precio'])&& isset($_POST['edit-lote'])&& isset($_POST['edit-cantidad_usada'])&& isset($_POST['edit-almacen'])){

    $codigo_mueble = $_POST['edit-codigo_mueble'];
    $fecha_terminacion = $_POST['edit-fecha_terminacion'];
    $estado = $_POST['edit-estado'];
    $fecha_venta = $_POST['edit-fecha_venta'];
    $precio = $_POST['edit-precio'];
    $lote_usado = $_POST['edit-lote'];
    $cantidad = $_POST['edit-cantidad_usada'];
    $almacen = $_POST['edit-almacen'];

    $consultaprecio = mysqli_query($connect,"SELECT precio FROM materia_prima INNER JOIN  lote ON materia_prima.tipo_mp = lote.tipo_mp WHERE codigo_lote = '$lote_usado'");
    while($precio = mysqli_fetch_array($consultaprecio)){$calculoprecio = $cantidad * $precio[0]; $porciento = ($calculoprecio * 20)/ 100; $preciomueble = $calculoprecio + $porciento; }


    $formatfecha_terminacion = date('Y-m-d', strtotime($fecha_terminacion));


if($estado === 'vendido' && $fecha_venta === ''){
    $formatfecha_venta = date('Y-m-d', time());
}

else if ($estado === 'vendido' && $fecha_venta != ''){
    $formatfecha_venta= date('Y-m-d', strtotime($fecha_venta));
}

else{
    $formatfecha_venta = '0000-00-00';
}

}

$update = "UPDATE mueble SET fecha_terminacion = '$formatfecha_terminacion', estado = '$estado', fecha_venta = '$formatfecha_venta', precio = '$preciomueble', lote_usado = '$lote_usado', cant_mp_usada = '$cantidad', almacen = '$almacen' WHERE codigo_mueble = '$codigo_mueble'";
$ejecutar = mysqli_query($connect,$update);

if (!$ejecutar){
    echo "<script>alert('No se actualizo el registro')</script>";
}

else{
    echo '<script>window.location = "../../gestion/gestionmueble.php"</script>';
}

$connect->close();