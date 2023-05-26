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
            $('#reportes-materiales-table').DataTable({
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
                    <h2>Reporte Materiales</h2>
                </div>
                <nav class="menu">
                    <a href="../index.php">Inicio</a>
                    <a href="../gestion/gestionmaterial.php">Gestion Materiales</a>
                    <a href="../gestion/gestionalmacen.php">Gestion Almacen</a>
                    <a href="reportemuebles.php">Reporte Muebles</a>
                </nav>
            </div>
        </header>
    </div>

    <div id="request_screen">

        <div id="table-container">
            <div id="filtrar-material-form-container">

                <form method="post" id="form-filtrar-material">
                    <input type="date" name="fechainicio_filtrar" id="input-fecha-inicio" class="form-control" >
                    <input type="date" name="fechafinal_filtrar" id="input-fecha-final" class="form-control">
                    <input type="submit" class="btn btn-primary" id="mostrarFiltrado" value="Filtrar Datos">
                </form>

            </div>
            <table id="reportes-materiales-table" class="display">
                <thead>
                    <tr>
                        <th>Codigo Lote</th>
                        <th>Tipo</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>Celda</th>
                        <th>Fecha Adquisicion</th>
                        <th>Almacen</th>
                        <th>Empresa Sum.</th>
                        <th>Codigo Suministrador</th>
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

                        $sql = "SELECT codigo_lote,lote.tipo_mp ,cantidad,precio_lote,celda,fecha_adquisicion,almacen,nombre_emp, codigo_sum FROM lote JOIN celda on lote.celda = celda.codigo_celda JOIN empresa_sum ON lote.tipo_mp = empresa_sum.tipo_mp JOIN suministrador ON empresa_sum.nombre_emp = suministrador.empresa WHERE fecha_adquisicion BETWEEN '$fecha_inicio' and '$fecha_final' ORDER BY fecha_adquisicion ASC";
                        $ejecutar = mysqli_query($connect, $sql);
                        while ($fila = mysqli_fetch_array($ejecutar)) {
                            echo "<tr>
                                      <td>". $fila[0] . "</td>
                                      <td>". $fila[1] . "</td>
                                      <td>". $fila[2] . "</td>
                                      <td>". $fila[3] ."</td>
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