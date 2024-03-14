<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    include("../connection/connection.php");
    $con = connection();

    $id_Venta = mysqli_real_escape_string($con, $_POST['id_Venta']);
    $Nit = mysqli_real_escape_string($con, $_POST['Nit']);
    $Fecha = mysqli_real_escape_string($con, $_POST['Fecha']);
    $id_Usuario = mysqli_real_escape_string($con, $_POST['id_Usuario']);
    $id_Empleado = mysqli_real_escape_string($con, $_POST['id_Empleado']);
    $total_Pagar = mysqli_real_escape_string($con, $_POST['total_Pagar']);
    $Peso = mysqli_real_escape_string($con, $_POST['Peso']);
    $id_Material = mysqli_real_escape_string($con, $_POST['id_Material']);

    $sql = "UPDATE tblVentas SET Nit='$Nit', Fecha='$Fecha', id_Usuario='$id_Usuario', id_Empleado='$id_Empleado', total_Pagar='$total_Pagar', Peso='$Peso', id_Material='$id_Material' WHERE id_Venta='$id_Venta'";

    $query = mysqli_query($con, $sql);

    if ($query) {
        header("Location: ventas.php");
        exit();
    } else {
        echo "Error al actualizar la venta: " . mysqli_error($con);
    }

} else {
    echo "Acceso no autorizado.";
}
?>