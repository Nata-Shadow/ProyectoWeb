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
        $(document).ready( function () {
            $('#muebles-table').DataTable({select:true});
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
                    <h2>Gestion Muebles</h2>
                </div>
                <nav class="menu">
                    <a href="../index.php">Inicio</a>
                    <a href="gestionalmacen.php">Gestion Almacen</a>
                    <a href="gestionusuarios.php">Gestion de Usuarios</a>
                    <a href="gestionmaterial.php">Gestion Materiales</a>
                    <a href="../reportes/reportemuebles.php">Reporte</a>
                </nav>
            </div>
        </header>
    </div>

    <div id="request_screen">

        <div id="table-container">
            <div id="add-button-container">
                <!-- Boton del Modal de Agregar Nuevo -->
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#AgregarMueble" id="modalAgregar">
                    Ingresar Mueble
                </button>
            </div>
            <table id="muebles-table" class="display">
                <thead><tr>
                    <th>Codigo Mueble</th>
                    <th>Fecha Terminacion</th>
                    <th>Estado</th>
                    <th>Fecha Venta</th>
                    <th>Precio</th>
                    <th>Lote Usado</th>
                    <th>Cantidad</th>
                    <th>Almacen</th>
                    <th>Acciones</th>

                </tr>
                </thead>

                    <tbody>
                    <?php
                    include ("../php_bd/dbconnect.php");
                    $sql = "SELECT * FROM mueble";
                    $ejecutar = mysqli_query($connect, $sql);


                    while ($fila = mysqli_fetch_array($ejecutar)) {

                        if ($fila[3] === '0000-00-00'){
                            $venta = 'No vendido';
                        }else {$venta = $fila[3];}

                        echo "<tr>
                                 <td>". $fila[0] ."</td>
                                 <td>". $fila[1] ."</td>
                                 <td>". $fila[2] ."</td>
                                 <td>". $venta ."</td>
                                 <td>". $fila[4] ."</td>
                                 <td>". $fila[5] ."</td>
                                 <td>". $fila[6] ."</td>
                                 <td>". $fila[7] ."</td>
                                 <td>". '<button type="button" class="btn btn-warning editbtn" data-bs-toggle="modal" data-bs-target="#EditarMueble">Editar</button>
                                         <button type="button" class="btn btn-danger deletebtn" data-bs-toggle="modal" data-bs-target="#EliminarMueble" style="margin-left: 10%">Eliminar</button>' . "</td>
                             </tr>";
                    }
                    ?>
                    </tbody>
            </table>
        </div>

        <!-- Modal de Agregar Nuevo -->

        <div class="modal fade" id="AgregarMueble" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Añadir Mueble</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form action="../php_bd/muebles/addNewMueble.php" method="post" id="form-add-mueble">
                            <div class="mb-2">
                                <label for="estado" class="col-form-label">Seleccione el estado que tendra el mueble</label>
                                <select type="text" name="estado" id="estado" class="form-select">
                                    <?php include ("../php_bd/functions.php"); mostrarEstadosMueble();?>
                                </select>
                            </div>
                            <div class="mb-2">
                                <label for="lote" class="col-form-label">Seleccione el lote usado</label>
                                <select type="text" name="lote" id="lote" class="form-select">
                                    <?php mostrarLote();?>
                                </select>
                            </div>
                            <div class="mb-2">
                                <label for="cantidad_usada" class="col-form-label">Ingrese la cantidad de materiales usados</label>
                                <input type="number" name="cantidad_usada" id="cantidad_usada" class="form-control" placeholder="cajas | galones | metros cuadrados" required>
                            </div>
                            <div class="mb-2">
                                <label for="almacen" class="col-form-label">Seleccione el Almacen almacenar</label>
                                <select type="text" name="almacen" id="almacen" class="form-select">
                                    <?php mostrarAlmacen();?>
                                </select>
                            </div>
                            <div class="mt-4 mb-2 float-end">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <input type="submit" class="btn btn-success" value="Añadir">
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>


        <!-- Boton del Modal de Editar Persona -->
        <!--<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Editar" id="modalEditar">
            Editar Persona
        </button> -->

        <!-- Modal de Editar Mueble -->

        <div class="modal fade" id="EditarMueble" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Mueble</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form action="../php_bd/muebles/updateMueble.php" method="post" id="form-edit-mueble">
                            <input type="hidden" name="edit-codigo_mueble" id="edit-codigo_mueble">
                            <div class="mb-2">
                                <label for="edit-fecha_terminacion" class="col-form-label">Fecha Terminacion: </label>
                                <input type="date" name="edit-fecha_terminacion" id="edit-fecha_terminacion" class="form-control" >
                            </div>
                            <div class="mb-2">
                                <label for="edit-estado" class="col-form-label">Estado del mueble: </label>
                                <select type="text" name="edit-estado" id="edit-estado" class="form-select">
                                    <?php mostrarEstadosMueble();?>
                                </select>
                            </div>
                            <div class="mb-2">
                                <label for="edit-fecha_venta" class="col-form-label">Fecha Venta: </label>
                                <input type="date" name="edit-fecha_venta" id="edit-fecha_venta" class="form-control" >
                            </div>
                            <div class="mb-2">
                                <label for="edit-precio" class="col-form-label">Precio: </label>
                                <input type="number" name="edit-precio" id="edit-precio" class="form-control" required>
                            </div>
                            <div class="mb-2">
                                <label for="edit-lote" class="col-form-label">Lote usado: </label>
                                <select type="text" name="edit-lote" id="edit-lote" class="form-select">
                                    <?php mostrarLoteEditar();?>
                                </select>
                            </div>
                            <div class="mb-2">
                                <label for="edit-cantidad_usada" class="col-form-label">Cantidad de materiales usada: </label>
                                <input type="number" name="edit-cantidad_usada" id="edit-cantidad_usada" class="form-control" placeholder="cajas | galones | metros cuadrados" required>
                            </div>
                            <div class="mb-2">
                                <label for="edit-almacen" class="col-form-label">Almacen: </label>
                                <select type="text" name="edit-almacen" id="edit-almacen" class="form-select">
                                    <?php mostrarAlmacenEditar();?>
                                </select>
                            </div>
                            <div class="mt-4 mb-2 float-end">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <input type="submit" class="btn btn-warning" value="Actualizar">
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>


        <script>
            $('.editbtn').on('click', function () {
                $tr = $(this).closest('tr');
                var datos = $tr.children("td").map(function () {
                    return $(this).text();
                });

                $('#edit-codigo_mueble').val(datos[0]);
                $('#edit-fecha_terminacion').val(datos[1]);
                $('#edit-estado').val(datos[2]);
                $('#edit-fecha_venta').val(datos[3]);
                $('#edit-precio').val(datos[4]);
                $('#edit-lote').val(datos[5]);
                $('#edit-cantidad_usada').val(datos[6]);
                $('#edit-almacen').val(datos[7]);

            });
        </script>

        <!-- Modal de Eliminar Mueble -->
        <div class="modal fade" id="EliminarMueble" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Eliminar Mueble</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h6>¿Estas seguro que desea eliminar el mueble?</h6>
                        <form action="../php_bd/muebles/deleteMueble.php" method="post" id="form-delete-mueble">
                            <input type="hidden" name="delete-codigo_mueble" id="delete-codigo_mueble">
                            <div class="modal-footer mt-4">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <input type="submit" class="btn btn-danger" value="Eliminar">
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <script>
            $('.deletebtn').on('click', function () {
                $tr = $(this).closest('tr');
                var datos = $tr.children("td").map(function () {
                    return $(this).text();
                });

                $('#delete-codigo_mueble').val(datos[0]);

            });
        </script>
    </div>
</div>
</body>
</html>