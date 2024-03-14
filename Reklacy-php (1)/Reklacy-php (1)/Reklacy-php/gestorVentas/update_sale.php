<?php
include("../connection/connection.php");
$con = connection();

$id_Venta = isset($_GET['id_Venta']) ? $_GET['id_Venta'] : '';

$sqlRoles = "SELECT DISTINCT Nombre FROM tblroles"; 
$queryRoles = mysqli_query($con, $sqlRoles);
$roles = mysqli_fetch_all($queryRoles, MYSQLI_ASSOC);

if (!empty($id_Venta)) {
    $sql = "SELECT * FROM tblVentas WHERE id_Venta='$id_Venta'";
    $query = mysqli_query($con, $sql);

    if ($query && mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_array($query);
    } else {
        echo "No se encontraron datos para el ID de venta proporcionado.";
        exit();
    }
} else {
    echo "ID de venta no proporcionado o es inválido.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar venta</title>
    <link rel="stylesheet" href="estilomaterial.css">
</head>

<body>
    <div class="sales-form">
        <form action="edit_sale.php" method="POST">
            <input type="hidden" name="id_Venta" value="<?= isset($row['id_Venta']) ? $row['id_Venta'] : '' ?>">
            
            <label for="Nit">Nit:</label>
            <input type="text" name="Nit" placeholder="Nit" value="<?= isset($row['Nit']) ? $row['Nit'] : '' ?>"><br>

            <label for="Fecha">Fecha:</label>
            <input type="text" name="Fecha" placeholder="Fecha" value="<?= isset($row['Fecha']) ? $row['Fecha'] : '' ?>"><br>

            <label for="id_Usuario">ID Usuario:</label>
            <input type="text" name="id_Usuario" placeholder="ID Usuario" value="<?= isset($row['id_Usuario']) ? $row['id_Usuario'] : '' ?>"><br>

            <label for="id_Empleado">ID Empleado:</label>
            <input type="text" name="id_Empleado" placeholder="ID Empleado" value="<?= isset($row['id_Empleado']) ? $row['id_Empleado'] : '' ?>"><br>

            <label for="total_Pagar">Total a Pagar:</label>
            <input type="text" name="total_Pagar" placeholder="Total a Pagar" value="<?= isset($row['total_Pagar']) ? $row['total_Pagar'] : '' ?>"><br>

            <label for="Peso">Peso:</label>
            <input type="text" name="Peso" placeholder="Peso" value="<?= isset($row['Peso']) ? $row['Peso'] : '' ?>"><br>

            <label for="id_Material">ID Material:</label>
            <input type="text" name="id_Material" placeholder="ID Material" value="<?= isset($row['id_Material']) ? $row['id_Material'] : '' ?>"><br>

            <input type="submit" value="Actualizar">
            <input type="reset" value="Cancelar">
        </form>
    </div>
</body>

</html>
