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
            $('#reportes-monetarios-table').DataTable({
                select:true ,ordering: false, lengthChange: false});
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
                    <h2>Reporte Monetario</h2>
                </div>
                <nav class="menu">
                    <a href="../index.php">Inicio</a>
                    <a href="#">Reporte Almacen</a>
                    <a href="reportemateriales.php">Reporte Materiales</a>
                    <a href="reportemuebles.php">Reporte Muebles</a>
                </nav>
            </div>
        </header>
    </div>

    <div id="request_screen">

        <div id="table-container">
            <div id="filtrar-mueble-form-container">

                <form method="post" id="form-filtrar-reportes">
                    <select name="filtrar_mes" id="filtrar_mes" class="form-select">
                        <option>Enero</option><option>Febrero</option><option>Marzo</option><option>Abril</option><option>Mayo</option><option>Junio</option>
                        <option>Julio</option><option>Agosto</option><option>Septiembre</option><option>Octubre</option><option>Noviembre</option><option>Diciembre</option>
                    </select>
                    <select name="filtrar_anno" id="filtrar_anno" class="form-select">
                        <option>2023</option><option>2022</option><option>2021</option><option>2020</option><option>2019</option>
                        <option>2018</option><option>2017</option><option>2016</option><option>2015</option><option>2014</option>
                    </select>
                    <input type="submit" class="btn btn-primary" id="mostrarFiltrado" value="Filtrar Datos">
                </form>

            </div>
            <table id="reportes-monetarios-table" class="display">
                <thead>
                    <tr>
                        <th>Mes - Año</th>
                        <th>Ingreso Total del Mes</th>
                        <th>Gastos Totales del Mes</th>

                    </tr>
                </thead>

                    <tbody>

                    <?php
                    include ("../php_bd/dbconnect.php");

                    if (isset($_POST['filtrar_mes']) && isset($_POST['filtrar_anno'])){

                        $mes = $_POST['filtrar_mes'];
                        $anno = $_POST['filtrar_anno'];


                        switch ($mes){
                            case 'Enero' :{$mesnumero = "01"; break;}
                            case 'Febrero' :{$mesnumero = "02"; break;}
                            case 'Marzo' :{$mesnumero = "03"; break;}
                            case 'Abril' :{$mesnumero = "04"; break;}
                            case 'Mayo' :{$mesnumero = "05"; break;}
                            case 'Junio' :{$mesnumero = "06"; break;}
                            case 'Julio' :{$mesnumero = "07"; break;}
                            case 'Agosto' :{$mesnumero = "08"; break;}
                            case 'Septiembre' :{$mesnumero = "09"; break;}
                            case 'Octubre' :{$mesnumero = "10"; break;}
                            case 'Noviembre' :{$mesnumero = "11"; break;}
                            case 'Diciembre' :{$mesnumero = "12"; break;}
                        }

                        $sqlingreso = "SELECT precio FROM mueble WHERE fecha_venta BETWEEN '".$anno."-".$mesnumero."-01' and '".$anno."-".$mesnumero."-31'";
                        $sqlgastos = "SELECT precio_lote FROM lote WHERE fecha_adquisicion BETWEEN '".$anno."-".$mesnumero."-01' and '".$anno."-".$mesnumero."-31'";
                        $ingreso = mysqli_query($connect, $sqlingreso);
                        $gasto = mysqli_query($connect, $sqlgastos);


                        $ingresototal = 0;
                        $gastadototal = 0;

                        while ($filasumaringreso = mysqli_fetch_array($ingreso)) {

                            $ingresototal += $filasumaringreso[0];

                        }

                        while ($filasumargasto = mysqli_fetch_array($gasto)) {

                            $gastadototal += $filasumargasto[0];

                        }


                            echo "<tr>
                                      <td>".$mes.' - '.$anno."</td>
                                      <td>". $ingresototal . "</td>
                                      <td>". $gastadototal . "</td>
                                  </tr>";
                    }

                    $connect->close();
                    ?>
                    </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>