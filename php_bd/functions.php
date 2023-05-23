<?php

include ("dbconnect.php");

/*function showTableData (){
    $connect = mysqli_connect("localhost","root","","saldo_celulares_diie");

    $sql = "SELECT * FROM propietario INNER JOIN celular ON propietario.numero = celular.numero";

    $result = $connect->query($sql);

    if ($result->num_rows > 0){
        while ($row = $result->fetch_assoc()){
            echo "<tr><td>".$row["grado"]."</td><td>".$row["nombre"]."</td><td>".$row["departamento"]."</td><td>".$row["cargo"]."</td><td>".$row["numero"]."</td><td>".$row["saldo_asignado"]."</td></tr>";
        }
    }

    $connect->close();
}*/ // CONSULTA ANTIGUA A LA BASE DE DATOS PARA PONER LOS DATOS EN LA TABLA

function sesionStart(){
    session_start();
}

    function mostrarDatosTablaAlmacen()
    {
        $connect = mysqli_connect("localhost", "root", "", "carpinteria");
        $sql = "SELECT * FROM almacen";
        $ejecutar = mysqli_query($connect, $sql);

        while ($fila = mysqli_fetch_array($ejecutar)) {

            $sqlceldas = "SELECT codigo_celda FROM celda";
            $celdascolum = $connect->query($sqlceldas);
            $i = 0;
            while($numcolumns = mysqli_fetch_array($celdascolum)){
                $i++;
            }
            echo "<tr><td>". $fila[0] . "</td><td>" . $fila[1] . "</td><td>" . $fila[2] . "</td><td>" . $i ."</td><td>". '<button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#Editar">Editar</button><button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#Eliminar" style="margin-left: 10%">Eliminar</button>' . "</td></tr>";


        }

    }

    function mostrarDatosTablaMaterial()
    {
        $connect = mysqli_connect("localhost", "root", "", "carpinteria");
        $sql = "SELECT * FROM lote";
        $ejecutar = mysqli_query($connect, $sql);

        while ($fila = mysqli_fetch_array($ejecutar)) {

            echo "<tr><td>". $fila[0] . "</td><td>" . $fila[1] . "</td><td>" . $fila[2] . "</td><td>" . $fila[3] ."</td><td>".$fila[4]."</td><td>". '<button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#Editar">Editar</button><button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#Eliminar" style="margin-left: 10%">Eliminar</button>' . "</td></tr>";


        }

    }

function mostrarDatosTablaUsuarios()
{
    $connect = mysqli_connect("localhost", "root", "", "carpinteria");
    $sql = "SELECT * FROM usuario";
    $ejecutar = mysqli_query($connect, $sql);

    while ($fila = mysqli_fetch_array($ejecutar)) {

        echo "<tr><td>". $fila[0] . "</td><td>" . $fila[1] . "</td><td>" . $fila[2] . "</td><td>" . $fila[3] ."</td><td>".$fila[4]."</td><td>". '<button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#EditarUser" id="editbtn"> Editar</button><button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#EliminarUser" style="margin-left: 10%">Eliminar</button>'."</td></tr>";

    }

}


function mostrarNumerosTelefonos(){
    $connect = mysqli_connect("localhost","root","","saldo_celulares_diie");

    $sql = "SELECT numero FROM celular";

    $result = $connect->query($sql);

    if ($result->num_rows > 0){
        while ($row = $result->fetch_assoc()){
            echo "<option>".$row['numero']."</option>";
        }
    }

    $connect->close();
}

function mostrarTiposDeMateriasPrimas(){
    $connect = mysqli_connect("localhost","root","","carpinteria");

    $sql = "SELECT tipo_mp FROM materia_prima";

    $result = $connect->query($sql);

    if ($result->num_rows > 0){
        while ($row = $result->fetch_assoc()){
            echo "<option>".$row['tipo_mp']."</option>";
        }
    }

    $connect->close();
}

function mostrarCeldas(){
    $connect = mysqli_connect("localhost","root","","carpinteria");

    $sql = "SELECT codigo_celda, tipo_mp FROM celda";

    $result = $connect->query($sql);

    if ($result->num_rows > 0){
        while ($row = $result->fetch_assoc()){
            echo "<option>".$row['codigo_celda'].' - '.$row['tipo_mp']."</option>";
        }
    }

    $connect->close();
}

function mostrarEstadosMueble(){
    $connect = mysqli_connect("localhost","root","","carpinteria");

    $sql = "SELECT estado FROM estado WHERE id_estado = '1'";

    $result = $connect->query($sql);

    if ($result->num_rows > 0){
        while ($row = $result->fetch_assoc()){
            echo "<option>".$row['estado']."</option>";
        }
    }

    $connect->close();
}

function mostrarEstadosAlmacen(){
    $connect = mysqli_connect("localhost","root","","carpinteria");

    $sql = "SELECT estado FROM estado WHERE id_estado = '2'";

    $result = $connect->query($sql);

    if ($result->num_rows > 0){
        while ($row = $result->fetch_assoc()){
            echo "<option>".$row['estado']."</option>";
        }
    }

    $connect->close();
}

function mostrarLote(){
    $connect = mysqli_connect("localhost","root","","carpinteria");

    $sql = "SELECT codigo_lote, tipo_mp FROM lote";

    $result = $connect->query($sql);

    if ($result->num_rows > 0){
        while ($row = $result->fetch_assoc()){
            echo "<option>".$row['codigo_lote'].' - '.$row['tipo_mp']."</option>";
        }
    }

    $connect->close();
}
function mostrarLoteEditar(){
    $connect = mysqli_connect("localhost","root","","carpinteria");

    $sql = "SELECT codigo_lote FROM lote";

    $result = $connect->query($sql);

    if ($result->num_rows > 0){
        while ($row = $result->fetch_assoc()){
            echo "<option>".$row['codigo_lote']."</option>";
        }
    }

    $connect->close();
}

function mostrarAlmacen(){
    $connect = mysqli_connect("localhost","root","","carpinteria");

    $sql = "SELECT codigo_almacen, contenido FROM almacen";

    $result = $connect->query($sql);

    if ($result->num_rows > 0){
        while ($row = $result->fetch_assoc()){
            echo "<option>".$row['codigo_almacen'].' - '.$row['contenido']."</option>";
        }
    }

    $connect->close();
}
function mostrarAlmacenEditar(){
    $connect = mysqli_connect("localhost","root","","carpinteria");

    $sql = "SELECT codigo_almacen FROM almacen";

    $result = $connect->query($sql);

    if ($result->num_rows > 0){
        while ($row = $result->fetch_assoc()){
            echo "<option>".$row['codigo_almacen']."</option>";
        }
    }

    $connect->close();
}




function cerrarSesion(){
        session_unset();
        session_destroy();
        echo "<script>location.href = '../login.php';</script>";
}