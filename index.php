<!doctype html>
<html lang="en">
<head>

    <!--CSS Importados-->
    <link rel="stylesheet" type="text/css" href="css/index_styles.css">
    <link rel="stylesheet" href="css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="css/select.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">


    <!--JQuery Importados-->
    <script type="text/javascript" src="js/jquery-3.6.4.min.js"></script>
    <script type="text/javascript" src="jquery/jquery.easyui.min.js"></script>
    <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
    <!-- <script type="text/javascript" src="js/dataTables.select.min.js"></script> -->
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/modals-treatment.js"></script>

    <!--Inicializacion de DataTable-->
    <script>
        $(document).ready( function () {
            $('#users-table').DataTable({select:true});
        });
    </script>
    <script>
        $(document).ready(function () {
            $("#enviarDatos").on("click", function (e) {
                e.preventDefault();
                agregarDatos();
            });
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
                     <h2>Gestion Almacen</h2>
                 </div>
                 <nav class="menu">
                     <a href="menu-lateral.php">Inicio</a>
                     <a href="#">Gestion de Usuarios</a>
                     <a href="">Contacto</a>
                 </nav>
             </div>
         </header>
    </div>

    <div id="request_screen">
        <!--<h3 id="people-list">Gestion del Almacen</h3> -->
        <div id="table-container">
            <div id="add-button-container">
                <!-- Boton del Modal de Agregar Nuevo -->
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#Agregar" id="modalAgregar">
                    Agregar Nuevo
                </button>
            </div>
            <table id="users-table" class="display">
                <thead><tr>
                    <th>Grado</th>
                    <th>Nombre y Apellidos</th>
                    <th>Departamento</th>
                    <th>Cargo</th>
                    <th>Numero</th>
                    <th>Saldo</th>
                    <th>Acciones</th>

                </tr>
                </thead>
                 <tbody>
                 <?php include("php_bd/functions.php"); mostrarDatosTabla();?>
                 </tbody>
            </table>
        </div>
        <div id="buttons-container">



            <!-- Modal de Agregar Nuevo -->

            <div class="modal fade" id="Agregar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Nuevo</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                           <form  id="formulario-agregar" method="post">
                               <div class="mb-2">
                                   <label for="grado" class="col-form-label">Ingrese el grado</label>
                                   <input type="text" name="grado" id="grado" class="form-control">
                               </div>
                               <div class="mb-2">
                                   <label for="nombre" class="col-form-label">Ingrese el nombre</label>
                                   <input type="text" name="nombre" id="nombre" class="form-control">
                               </div>
                               <div class="mb-2">
                                   <label for="departamento" class="col-form-label">Ingrese el departamento</label>
                                   <input type="text" name="departamento" id="departamento" class="form-control">
                               </div>
                               <div class="mb-2">
                                   <label for="cargo" class="col-form-label">Ingrese el cargo</label>
                                   <input type="text" name="cargo" id="cargo" class="form-control">
                               </div>
                               <div class="mb-2">
                                   <label for="numero" class="col-form-label">Elija el numero</label>
                                   <select type="text" name="numero" id="numero" class="form-select">
                                       <?php mostrarNumerosTelefonos();?>
                               </select>
                               </div>
                           </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button id="enviarDatos" type="button" class="btn btn-success">Agregar</button>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Boton del Modal de Editar Persona -->
            <!--<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Editar" id="modalEditar">
                Editar Persona
            </button> -->

            <!-- Modal de Editar Persona -->
            <div class="modal fade" id="Editar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Editar</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form  id="formulario-editar" method="post">
                                <div class="mb-2">
                                    <label for="gradoE" class="col-form-label">Ingrese el grado</label>
                                    <input type="text" name="gradoE" id="gradoE" class="form-control">
                                </div>
                                <div class="mb-2">
                                    <label for="nombreE" class="col-form-label">Ingrese el nombre</label>
                                    <input type="text" name="nombreE" id="nombreE" class="form-control">
                                </div>
                                <div class="mb-2">
                                    <label for="departamentoE" class="col-form-label">Ingrese el departamento</label>
                                    <input type="text" name="departamentoE" id="departamentoE" class="form-control">
                                </div>
                                <div class="mb-2">
                                    <label for="cargoE" class="col-form-label">Ingrese el cargo</label>
                                    <input type="text" name="cargoE" id="cargoE" class="form-control">
                                </div>
                                <div class="mb-2">
                                    <label for="numeroE" class="col-form-label">Elija el numero</label>
                                    <select type="text" name="numeroE" id="numeroE" class="form-select">
                                        <?php mostrarNumerosTelefonos();?>
                                    </select>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer" id="editar-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-success" id="save-changes">Guardar Cambios</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Button trigger modal -->
            <!--<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Eliminar" id="modalEliminar">
                Eliminar Persona
            </button> -->

            <!-- Modal de Eliminar Persona -->
            <div class="modal fade" id="Eliminar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
            </div>
        </div>
    </div>
</div>
</body>
</html>
