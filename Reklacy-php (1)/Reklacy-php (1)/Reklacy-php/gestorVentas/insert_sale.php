<?php
include("../connection/connection.php");
$con = connection();

$id_Venta = $_POST['id_Venta'];
$Fecha = $_POST['Fecha'];
$id_Usuario = $_POST['id_Usuario'];
$id_Empleado = $_POST['id_Empleado'];
$total_Pagar = $_POST['total_Pagar'];
$Peso = $_POST['Peso'];
$id_Material = $_POST['id_Material'];

$checkVenta = mysqli_query($con, "SELECT * FROM tblVentas WHERE id_Venta = '$id_Venta'");
if (mysqli_num_rows($checkVenta) == 0) {

    $sql = "INSERT INTO tblVentas (id_Venta, Fecha, id_Usuario, id_Empleado, total_Pagar, Peso, id_Material) VALUES ('$id_Venta', '$Fecha', '$id_Usuario', '$id_Empleado', '$total_Pagar', '$Peso', '$id_Material')";
    $query = mysqli_query($con, $sql);

    if ($query) {
        echo("Se registró la venta");
    } else {
        echo "Error al insertar la venta: " . mysqli_error($con);
    }
} else {
    echo "Error: La venta con ID '$id_Venta' ya existe.";
}
?>