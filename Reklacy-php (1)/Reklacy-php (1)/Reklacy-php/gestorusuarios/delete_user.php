<?php

if (isset($_GET["id_Usuario"]) && is_numeric($_GET["id_Usuario"])) {

    include("../connection/connection.php");
    $con = connection();

    $id_Usuario = mysqli_real_escape_string($con, $_GET["id_Usuario"]);

    $sql = "DELETE FROM tblUsuario WHERE id_Usuario = $id_Usuario";

    $query = mysqli_query($con, $sql);

    if ($query) {
        header("Location: usuario.php");
        exit();
    } else {
        echo "Error al eliminar el usuario: " . mysqli_error($con);
    }

} else {
    echo "ID no proporcionada o es inválida.";
}
?>