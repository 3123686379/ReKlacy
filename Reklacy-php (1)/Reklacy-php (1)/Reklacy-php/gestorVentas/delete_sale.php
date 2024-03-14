<?php

if (isset($_GET["id_Venta"]) && is_numeric($_GET["id_Venta"])) {

    include("../connection/connection.php");
    $con = connection();

    $id_Venta = mysqli_real_escape_string($con, $_GET["id_Venta"]);

    $sql = "DELETE FROM tblVentas  WHERE id_Venta = $id_Venta";

    $query = mysqli_query($con, $sql);

    if ($query) {
        header("Location: ventas.php");
        exit();
    } else {
        echo "Error al eliminar el empleado: " . mysqli_error($con);
    }

} else {
    echo "ID no proporcionada o es inválida.";
}

