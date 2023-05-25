<!doctype html>
<html lang="en">
<?php session_start();?>
<head>

    <!--CSS Importados-->
    <link rel="stylesheet" type="text/css" href="index_styles.css">
    <link rel="stylesheet" href="css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="css/select.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">



    <!--JQuery Importados-->
    <script type="text/javascript" src="js/jquery-3.6.4.min.js"></script>
    <script type="text/javascript" src="jquery/jquery.easyui.min.js"></script>
    <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>

    <!--Inicializacion de DataTable-->
    <script>
        $(document).ready( function () {
            $('#tablaUsuarios').DataTable({});
        });
    </script>
    <meta charset="iso-8859-15">
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
                     <h2>Gestion Usuarios</h2>
                 </div>
                 <nav class="menu">
                     <a href="index.php">Inicio</a>
                     <a href="gestionalmacen.php">Gestion Almacen</a>
                     <a href="gestionmaterial.php">Gestion Materiales</a>
                     <a href="gestionmueble.php">Gestion Muebles</a>
                 </nav>
             </div>
         </header>
    </div>

    <div id="request_screen">
        <!--<h3 id="people-list">Gestion del Almacen</h3> -->
        <div id="table-container">
            <div id="add-button-container">
                <!-- Boton del Modal de Agregar Nuevo -->
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#AgregarUser" id="modalAgregar">
                    Agregar Usuario
                </button>
            </div>
            <table id="tablaUsuarios" class="display">
                <thead><tr>
                    <th>ID Usuario</th>
                    <th>Nombre</th>
                    <th>Primer Apellido</th>
                    <th>Segundo Apellido</th>
                    <th>Username</th>
                    <th>Acciones</th>
                </tr>
                </thead>




                 <tbody>
                 <?php
                include ("php_bd/dbconnect.php");
                $sql = "SELECT * FROM usuario";
                $ejecutar = mysqli_query($connect, $sql);
                while ($fila = mysqli_fetch_array($ejecutar)) {
                    echo "<tr>
                        <td>". $fila[0] . "</td>
                        <td>". $fila[1] . "</td>
                        <td>". $fila[2] . "</td>
                        <td>". $fila[3] ."</td>
                        <td>". $fila[4]."</td>
                        <td>". '<button type="button" class="btn btn-warning editbtn" data-bs-toggle="modal" data-bs-target="#EditarUser" id="editbtn"> Editar</button>
                                <button type="button" class="btn btn-danger deletebtn" data-bs-toggle="modal" data-bs-target="#EliminarUser" style="margin-left: 10%">Eliminar</button>' ."</td>
                          </tr>";
                 }
                 ?>
                 </tbody>

            </table>
        </div>
        <!-- ////////////////////////////////////////////////    MODALES //////////////////////////////////////////////////////////////////////// -->

        <!-- Modal de Agregar Usuario -->

        <div class="modal fade" id="AgregarUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Nuevo Usuario</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form action="php_bd/usuarios/addUser.php" method="post" id="form-add-user">
                            <div class="mb-2">
                                <label for="nombre" class="col-form-label">Ingrese el nombre</label>
                                <input type="text" name="nombre" id="nombre" class="form-control" required>
                            </div>
                            <div class="mb-2">
                                <label for="apellido1" class="col-form-label">Ingrese el primer apellido</label>
                                <input type="text" name="apellido1" id="apellido1" class="form-control" required>
                            </div>
                            <div class="mb-2">
                                <label for="apellido2" class="col-form-label">Ingrese el segundo apellido</label>
                                <input type="text" name="apellido2" id="apellido2" class="form-control" required>
                            </div>
                            <div class="mb-2">
                                <label for="usuario" class="col-form-label">Ingrese el nombre de usuario</label>
                                <input type="text" name="usuario" id="usuario" class="form-control" required>
                            </div>
                            <div class="mb-2">
                                <label for="password" class="col-form-label">Ingrese su contraseña</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                            <div class="mt-3 mb-2">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <input type="submit" class="btn btn-success" value="Agregar">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal de Editar Usuario -->
        <div class="modal fade" id="EditarUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Usuario</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form action="php_bd/usuarios/updateUser.php" method="post" id="form-update-user">
                            <input type="hidden" name="edit-id_usuario" id="edit-id_usuario">
                            <div class="mb-2">
                                <label for="edit-nombre" class="col-form-label">Nombre: </label>
                                <input type="text" name="edit-nombre" id="edit-nombre" class="form-control">
                            </div>
                            <div class="mb-2">
                                <label for="edit-apellido1" class="col-form-label">Primer Apellido: </label>
                                <input type="text" name="edit-apellido1" id="edit-apellido1" class="form-control">
                            </div>
                            <div class="mb-2">
                                <label for="edit-apellido2" class="col-form-label">Segundo apellido: </label>
                                <input type="text" name="edit-apellido2" id="edit-apellido2" class="form-control">
                            </div>
                            <div class="mb-2">
                                <label for="edit-usuario" class="col-form-label">Usuario: </label>
                                <input type="text" name="edit-usuario" id="edit-usuario" class="form-control">
                            </div>
                            <div class="mt-3 mb-2">
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

                $('#edit-id_usuario').val(datos[0]);
                $('#edit-nombre').val(datos[1]);
                $('#edit-apellido1').val(datos[2]);
                $('#edit-apellido2').val(datos[3]);
                $('#edit-usuario').val(datos[4]);

            });
        </script>

        <!-- Modal de Eliminar Usuario -->
        <div class="modal fade" id="EliminarUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Eliminar Usuario</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h6>¿Estas seguro que desea eliminar al usuario?</h6>
                        <form action="php_bd/usuarios/deleteUser.php" method="post" id="form-delete-user">
                            <input type="hidden" name="delete-id_usuario" id="delete-id_usuario">
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

                $('#delete-id_usuario').val(datos[0]);

            });
        </script>
        <div id="buttons-container">






            <!-- Boton del Modal de Editar Persona -->
            <!--<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Editar" id="modalEditar">
                Editar Persona
            </button> -->






            <!-- Button trigger modal -->
            <!--<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Eliminar" id="modalEliminar">
                Eliminar Persona
            </button> -->

            <!-- Modal de Eliminar Persona
            <div class="modal fade" id="EliminarUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">¿Estas seguro que deseas eliminarlo?</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-2">
                                <label for="dnombre" class="col-form-label">Nombre: </label>
                                <input type="text" name="dnombre" id="dnombre " class="form-control">
                            </div>
                            <div class="mb-2">
                                <label for="dcelular" class="col-form-label">Celular</label>
                                <input type="text" name="dcelular" id="dcelular" class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-danger">Eliminar</button>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</div>
</body>
</html>