<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    include("../connection/connection.php");
    $con = connection();

    $id_Usuario = mysqli_real_escape_string($con, $_POST['id_Usuario']);
    $nombre = mysqli_real_escape_string($con, $_POST['Nombre']);
    $correo = mysqli_real_escape_string($con, $_POST['Correo']);
    $telefono = mysqli_real_escape_string($con, $_POST['Telefono']);
    $direccion = mysqli_real_escape_string($con, $_POST['Direccion']);
    $contraseña = mysqli_real_escape_string($con, $_POST['Contraseña']);

    $sql = "UPDATE tblUsuario SET Nombre=?, Correo=?, Telefono=?, Direccion=?, Contraseña=? WHERE id_Usuario=?";

    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "ssiss", $nombre, $correo, $telefono, $direccion, $contraseña, $id_Usuario);

    $query = mysqli_stmt_execute($stmt);

    if ($query) {
        header("Location: usuario.php");
        exit();
    } else {
        echo "Error al actualizar el usuario: " . mysqli_error($con);
    }

    mysqli_stmt_close($stmt);

} else {
    echo "Acceso no autorizado.";
}
?>
