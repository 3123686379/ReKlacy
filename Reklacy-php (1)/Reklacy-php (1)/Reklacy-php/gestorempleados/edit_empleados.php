<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    
    include("../connection/connection.php");
    $con = connection();

    
    $id_Empleado = mysqli_real_escape_string($con, $_POST['id_Empleado']);
    $rol = mysqli_real_escape_string($con, $_POST['rol']);
    $nombre = mysqli_real_escape_string($con, $_POST['nombre']);
    $contraseña = mysqli_real_escape_string($con, $_POST['contraseña']);
    $telefono = mysqli_real_escape_string($con, $_POST['telefono']);

   
    $sql = "UPDATE tblempleados SET  rol='$rol', nombre='$nombre', contraseña='$contraseña', telefono='$telefono' WHERE id_Empleado='$id_Empleado'";

    
    $query = mysqli_query($con, $sql);

   
    if ($query) {
        header("Location: empleado.php"); 
        exit();
    } else {
        echo "Error al actualizar el usuario: " . mysqli_error($con);
    }

} else {
    echo "Acceso no autorizado.";
}
?>