<?php
include("../connection/connection.php");
$con = connection();

$id_Empleado = $_POST['id_Empleado'];
$rol = $_POST['Rol'];
$nombre = $_POST['Nombre'];
$contrasena = $_POST['Contraseña'];
$telefono = $_POST['Telefono'];

$checkEmpleado = mysqli_query($con, "SELECT * FROM tblEmpleados WHERE id_Empleado = '$id_Empleado'");
if (mysqli_num_rows($checkEmpleado) == 0) {

    $sql = "INSERT INTO tblEmpleados (id_Empleado, Rol, Nombre, Contraseña, Telefono) VALUES ('$id_Empleado', '$rol', '$nombre', '$contrasena', '$telefono')";
    $query = mysqli_query($con, $sql);

    if ($query) {
        header("Location: empleado.php");
    } else {
        echo "Error al insertar empleado: " . mysqli_error($con);
    }
} else {
    echo "Error: El empleado con ID '$id_Empleado' ya existe.";
}
?>
