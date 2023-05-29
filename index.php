<!DOCTYPE html>
<html lang="es">
<?php if(!$_COOKIE['usuario']){
    header("Location: php_bd/login.php");
}
else{
    session_start();
}
?>
<head>
    <meta charset="UTF-8">
    <title>Carpinteria CubanWood</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
<header class="header">
    <div class="container">
        <div class="btn-menu">
            <label for="btn-menu">☰</label>
        </div>
        <div class="logo">
            <h1>Carpinteria CubanWood</h1>
        </div>
    </div>

</header>
<div class="capa"></div>
<!--	--------------->
<!--
<div id="center-text">
    <h2>Bienvenidos a CubanWood</h2><h4>Este sistema es el encargado de monitorizar, gestionar y actualizar todo lo relacionado con la adquisición de materias primas, el almacenamiento de estas, el stock de muebles y las ventas de los mismos</h4>
</div>
-->
<input type="checkbox" id="btn-menu">
<div class="container-menu">

    <div class="cont-menu">
        <nav>
            <h2> Usuario: <?php
                echo $_COOKIE['usuario'];
                ?></h2>
            <a href="gestion/gestionalmacen.php">Gestion de Almacen</a>
            <a href="gestion/gestionusuarios.php">Gestion de Usuarios</a>
            <a href="gestion/gestionmaterial.php">Gestion de Materia Prima</a>
            <a href="gestion/gestionmueble.php">Gestion de Muebles</a>
            <a href="reportes/reportemonetario.php">Reporte Monetario</a>
            <a <?php if(isset($_COOKIE['usuario']) || isset($_SESSION['usuario'])){
                session_unset();session_destroy();}?> href="php_bd/login.php" >Cerrar Sesion</a>
            <a href="#"></a>
        </nav>
        <label for="btn-menu">✖️</label>
    </div>
</div>
</body>
</html>