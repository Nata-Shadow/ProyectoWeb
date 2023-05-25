<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "carpinteria";

$connect = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

if (!$connect){
    die("No hay conexion con la base de datos" .mysqli_connect_error());
}
?>