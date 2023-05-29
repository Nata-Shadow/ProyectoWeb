<!doctype html>
<html lang="en">
<head>

    <!--CSS Importados-->
    <link rel="stylesheet" type="text/css" href="../css/index_styles.css">
    <link rel="stylesheet" href="../css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="../css/select.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">


    <!--JQuery Importados-->
    <script type="text/javascript" src="../js/jquery-3.6.4.min.js"></script>
    <script type="text/javascript" src="../jquery/jquery.easyui.min.js"></script>
    <script type="text/javascript" src="../js/jquery.dataTables.min.js"></script>
    <!-- <script type="text/javascript" src="js/dataTables.select.min.js"></script> -->
    <script type="text/javascript" src="../js/bootstrap.js"></script>

    <!--Inicializacion de DataTable-->
    <script>
        $(document).ready(function () {
            $('#reportes-muebles-table').DataTable({
                select:true ,ordering: false, lengthChange: false});
            hunter = false;
        });
    </script>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title></head>
<body>
<div id="main">
    <div id="user-logged-nav">
        <header class="header">
            <div class="container">
                <div class="logo">
                    <h2>Reporte Muebles</h2>
                </div>
                <nav class="menu">
                    <a href="../index.php">Inicio</a>
                    <a href="../gestion/gestionmueble.php">Gestion Muebles</a>
                    <a href="../gestion/gestionalmacen.php">Gestion Almacen</a>
                    <a href="reportemateriales.php">Reporte Materiales</a>
                </nav>
            </div>
        </header>
    </div>

    <div id="request_screen">

        <div id="table-container">
            <div id="filtrar-mueble-form-container">

                <form method="post" id="form-filtrar-muebles">
                    <input type="date" name="fechainicio_filtrar" id="input-fecha-inicio" class="form-control">
                    <input type="date" name="fechafinal_filtrar" id="input-fecha-final" class="form-control">
                    <input type="submit" class="btn btn-primary" id="mostrarFiltrado" value="Filtrar Datos">
                </form>

            </div>
            <table id="reportes-muebles-table" class="display">
                <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Fecha Terminacion</th>
                        <th>Estado</th>
                        <th>Fecha Venta</th>
                        <th>Precio</th>
                        <th>Lote Usado</th>
                        <th>Cantidad Usada</th>
                        <th>Almacen</th>
                        <th>Tipo de Material</th>
                    </tr>
                </thead>

                    <tbody>

                    <?php
                    include ("../php_bd/dbconnect.php");

                    if (isset($_POST['fechainicio_filtrar']) && isset($_POST['fechafinal_filtrar'])){

                        $fecha_inicio = $_POST['fechainicio_filtrar'];
                        $fecha_final = $_POST['fechafinal_filtrar'];

                        $formatfecha_inicio = date('Y-m-d', strtotime($fecha_inicio));
                        $formatfecha_final = date('Y-m-d', strtotime($fecha_final));



                        $sql = "SELECT codigo_mueble,fecha_terminacion,estado,fecha_venta,precio,lote_usado,cant_mp_usada,almacen,tipo_mp FROM mueble JOIN lote ON mueble.lote_usado = lote.codigo_lote WHERE fecha_terminacion BETWEEN '$formatfecha_inicio' and '$formatfecha_final' ORDER BY fecha_terminacion ASC ";
                        $ejecutar = mysqli_query($connect, $sql);
                        while ($fila = mysqli_fetch_array($ejecutar)) {

                            if ($fila[2] === 'almacenado'){
                                $venta = 'No vendido';
                            }
                            else{
                                $venta = $fila[3];
                            }
                            echo "<tr>
                                      <td>". $fila[0] . "</td>
                                      <td>". $fila[1] . "</td>
                                      <td>". $fila[2] . "</td>
                                      <td>". $venta ."</td>
                                      <td>". $fila[4]."</td>
                                      <td>". $fila[5]."</td>
                                      <td>". $fila[6]."</td>
                                      <td>". $fila[7]."</td>
                                      <td>". $fila[8]."</td>
                                 </tr>";
                    }}

                    $connect->close();
                    ?>
                    </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>