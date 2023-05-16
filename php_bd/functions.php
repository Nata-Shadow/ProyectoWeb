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

    function mostrarDatosTabla()
    {
        $connect = mysqli_connect("localhost", "root", "", "saldo_celulares_diie");
        $sql = "SELECT * FROM propietario INNER JOIN celular ON propietario.numero = celular.numero";
        $ejecutar = mysqli_query($connect, $sql);

        while ($fila = mysqli_fetch_array($ejecutar)) {


            $elementos = $fila[1] . "||" . $fila[2] . "||" . $fila[3] . "||" . $fila[4] . "||" . $fila[5];
            echo "<tr><td>" . $fila[1] . "</td><td>" . $fila[2] . "</td><td>" . $fila[3] . "</td><td>" . $fila[4] . "</td><td>" . $fila[5] . "</td><td>" . $fila[7] . "</td><td>" . '<button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#Editar">Editar</button><button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#Eliminar" style="margin-left: 15%">Eliminar</button>' . "</td></tr>";


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