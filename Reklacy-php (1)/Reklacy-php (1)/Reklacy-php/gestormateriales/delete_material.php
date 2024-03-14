<?php

if (isset($_POST["id_Material"]) && is_numeric($_POST["id_Material"])) {

    include("../connection/connection.php");
    $con = connection();

    $id_Material = mysqli_real_escape_string($con, $_POST["id_Material"]);

    $sql = "DELETE FROM material WHERE id_Material = $id_Material";

    $query = mysqli_query($con, $sql);

    if ($query) {
        echo("se eliminó material");
        exit();
    } else {
        echo "Error al eliminar el empleado: " . mysqli_error($con);
    }

} else {
    echo "Id  no proporcionada o es inválida.";
}
?>
