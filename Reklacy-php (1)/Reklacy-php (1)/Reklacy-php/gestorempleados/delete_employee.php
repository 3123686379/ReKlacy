<?php

if (isset($_GET["id_Empleado"]) && is_numeric($_GET["id_Empleado"])) {

    include("../connection/connection.php");
    $con = connection();

    $id_Empleado = mysqli_real_escape_string($con, $_GET["id_Empleado"]);

    $sql = "DELETE FROM tblEmpleados WHERE id_Empleado = $id_Empleado";

    $query = mysqli_query($con, $sql);

    if ($query) {
        header("Location: empleado.php");
        exit();
    } else {
        echo "Error al eliminar el empleado: " . mysqli_error($con);
    }

} else {
    echo "ID no proporcionada o es inválida.";
}
?>
