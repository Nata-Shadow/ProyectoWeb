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
    <!-- <script type="text/javascript" src="../js/dataTables.select.min.js"></script> -->
    <script type="text/javascript" src="../js/bootstrap.js"></script>

    <!--Inicializacion de DataTable-->
    <script>
        $(document).ready( function () {
            $('#lotes-table').DataTable({select:true});
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
                     <h2>Gestion Materias Primas</h2>
                 </div>
                 <nav class="menu">
                     <a href="../index.php">Inicio</a>
                     <a href="gestionalmacen.php">Gestion Almacen</a>
                     <a href="gestionusuarios.php">Gestion de Usuarios</a>
                     <a href="gestionmueble.php">Gestion Muebles</a>
                     <a href="../reportes/reportemateriales.php">Reporte</a>
                 </nav>
             </div>
         </header>
    </div>

    <div id="request_screen">
        <!--<h3 id="people-list">Gestion del Almacen</h3> -->
        <div id="table-container">
            <div id="add-button-container">
                <!-- Boton del Modal de Agregar Nuevo -->
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#AgregarLote" id="modalAgregar">
                   Adquirir Lote
                </button>
            </div>
            <table id="lotes-table" class="display">
                <thead><tr>
                    <th>Codigo Lote</th>
                    <th>Tipo Material</th>
                    <th>Cantidad</th>
                    <th>Precio Lote</th>
                    <th>Numero Celda</th>
                    <th>Acciones</th>

                </tr>
                </thead>

                    <tbody>
                    <?php
                    include ("../php_bd/dbconnect.php");
                    $sql = "SELECT * FROM lote";
                    $ejecutar = mysqli_query($connect, $sql);
                    while ($fila = mysqli_fetch_array($ejecutar)) {
                        echo "<tr>
                                 <td>". $fila[0] . "</td>
                                 <td>". $fila[1] . "</td>
                                 <td>". $fila[2] . "</td>
                                 <td>". $fila[3] . "</td>
                                 <td>". $fila[4] . "</td>
                                 <td>". '<button type="button" class="btn btn-warning editbtn" data-bs-toggle="modal" data-bs-target="#EditarLote" id="editbtn"> Editar</button>
                                         <button type="button" class="btn btn-danger deletebtn" data-bs-toggle="modal" data-bs-target="#EliminarLote" style="margin-left: 10%">Eliminar</button>' ."</td>
                              </tr>";
                    }
                    ?>
                    </tbody>
            </table>
        </div>

        <!-- Modal de Agregar Nuevo -->

        <div class="modal fade" id="AgregarLote" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Adquirir Lote de Material</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form action="../php_bd/materia_prima/addNewLote.php" method="post"id="form-add-lote" >
                            <div class="mb-2">
                                <label for="tipo_mp" class="col-form-label">Seleccione el tipo de material</label>
                                <select type="text" name="tipo_mp" id="tipo_mp" class="form-select">
                                    <?php include ("../php_bd/functions.php"); mostrarTiposDeMateriasPrimas();?>
                                </select>
                            </div>
                            <div class="mb-2">
                                <label for="cantidad" class="col-form-label">Ingrese la cantidad a adquirir</label>
                                <input type="number" name="cantidad" id="cantidad" class="form-control" placeholder="cajas | galones | metros cuadrados">
                            </div>
                            <div class="mb-2">
                                <label for="celda" class="col-form-label">Selecione una celda donde almacenar</label>
                                <select type="text" name="celda" id="celda" class="form-select">
                                    <?php mostrarCeldas();?>
                                </select>
                            </div>
                            <div class="mt-4 mb-2 float-end">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <input type="submit" class="btn btn-success" value="Adquirir">
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

        <!-- Modal de Editar Persona -->
        <div class="modal fade" id="EditarLote" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Lote</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form action="../php_bd/materia_prima/updateLote.php" method="post"id="form-edit-lote" >
                            <input type="hidden" name="edit-codigo_lote" id="edit-codigo_lote">
                            <div class="mb-2">
                                <label for="edit-tipo_mp" class="col-form-label">Tipo de Material: </label>
                                <select type="text" name="edit-tipo_mp" id="edit-tipo_mp" class="form-select">
                                    <?php mostrarTiposDeMateriasPrimas();?>
                                </select>
                            </div>
                            <div class="mb-2">
                                <label for="edit-cantidad" class="col-form-label">Cantidad: </label>
                                <input type="number" name="edit-cantidad" id="edit-cantidad" class="form-control" placeholder="cajas | galones | metros cuadrados">
                            </div>
                            <div class="mb-2">
                                <label for="edit-celda" class="col-form-label">Celda: </label>
                                <select type="text" name="edit-celda" id="edit-celda" class="form-select">
                                    <?php mostrarCeldas();?>
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

                $('#edit-codigo_lote').val(datos[0]);
                $('#edit-tipo_mp').val(datos[1]);
                $('#edit-cantidad').val(datos[2]);
                $('#edit-celda').val(datos[4]);
            });
        </script>

        <!-- Modal de Eliminar Usuario -->
        <div class="modal fade" id="EliminarLote" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Eliminar Lote</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h6>¿Estas seguro que desea eliminar el lote?</h6>
                        <form action="../php_bd/materia_prima/deleteLote.php" method="post" id="form-delete-lote">
                            <input type="hidden" name="delete-codigo_lote" id="delete-codigo_lote">
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

                $('#delete-codigo_lote').val(datos[0]);

            });
        </script>
    </div>
</div>
</body>
</html>