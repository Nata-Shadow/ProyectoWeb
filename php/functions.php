<?php

include ("../php_bd/dbconnect.php");


    $connect = mysqli_connect("localhost","root","","saldo_celulares_diie");

    $sql = "SELECT * FROM propietario INNER JOIN celular ON propietario.numero = celular.numero";

    $result = $connect->query($sql);

    if ($result->num_rows > 0){
        while ($row = $result->fetch_assoc()){
            echo "<tr><td>".$row["grado"]."</td><td>".$row["nombre"]."</td><td>".$row["departamento"]."</td><td>".$row["cargo"]."</td><td>".$row["numero"]."</td><td>".$row["saldo_asignado"]."</td></tr>";
        }
    }

    $connect->close();

