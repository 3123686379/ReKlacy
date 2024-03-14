<?php
include("../connection/connection.php");
$con = connection();

$sqlMaterial = "SELECT * FROM material_usuario";
$queryMaterial = mysqli_query($con, $sqlMaterial);
$Id = $_POST['Id'];
$nombre_material = $_POST['nombre_material'];
$tipo_de_material = $_POST['tipo_de_material'];
$cantidad = $_POST['cantidad'];




    $sql = "INSERT INTO material_usuario (Id, nombre_material, tipo_de_material, cantidad) VALUES ('$Id', '$nombre_material', '$tipo_de_material', '$cantidad')";
    $query = mysqli_query($con, $sql);

    if ($query) {
        echo("se agregó material");
    } else {
        echo "Error al insertar el material: " . mysqli_error($con);
    }



