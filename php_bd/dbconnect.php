<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "saldo_celulares_diie";

$connect = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

if (!$connect){
    die("No hay conexion con la base de datos" .mysqli_connect_error());
}
?>