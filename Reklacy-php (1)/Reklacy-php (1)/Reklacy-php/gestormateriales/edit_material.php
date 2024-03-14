<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    include("../connection/connection.php");
    $con = connection();

    $id_Material = mysqli_real_escape_string($con, $_POST['id_Material']);
    $nombre_Material = mysqli_real_escape_string($con, $_POST['nombre_Material']);
    $tipo_Material = mysqli_real_escape_string($con, $_POST['tipo_Material']);
    $tarifa = mysqli_real_escape_string($con, $_POST['Tarifa']);
    $peso = mysqli_real_escape_string($con, $_POST['Peso']);

    $sql = "UPDATE tblMaterial SET nombre_Material='$nombre_Material', tipo_Material='$tipo_Material', Tarifa='$tarifa', Peso='$peso' WHERE id_Material='$id_Material'";

    $query = mysqli_query($con, $sql);

    if ($query) {
        echo("se editó el material");
        exit();
    } else {
        echo "Error al actualizar el material: " . mysqli_error($con);
    }

} 

