<?php
include("../connection/connection.php");
$con = connection();

$id_Material = $_POST['id_Material'];
$nombre_Material = $_POST['nombre_Material'];
$tipo_Material = $_POST['tipo_Material'];
$tarifa = $_POST['Tarifa'];
$peso = $_POST['Peso'];



    $sql = "INSERT INTO tblMaterial (id_Material, nombre_Material, tipo_Material, Tarifa, Peso) VALUES ('$id_Material', '$nombre_Material', '$tipo_Material', '$tarifa', '$peso')";
    $query = mysqli_query($con, $sql);

    if ($query) {
        echo("se agregó material");
    } else {
        echo "Error al insertar el material: " . mysqli_error($con);
    }



