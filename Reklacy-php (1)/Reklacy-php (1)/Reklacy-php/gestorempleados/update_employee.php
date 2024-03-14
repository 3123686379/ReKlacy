<?php
include("../connection/connection.php");
$con = connection();

$id_Empleado = isset($_GET['id_Empleado']) ? $_GET['id_Empleado'] : '';


$sqlRoles = "SELECT DISTINCT Nombre FROM tblroles"; 
$queryRoles = mysqli_query($con, $sqlRoles);
$roles = mysqli_fetch_all($queryRoles, MYSQLI_ASSOC);

if (!empty($id_Empleado)) {
    $sql = "SELECT * FROM tblEmpleados WHERE id_Empleado='$id_Empleado'";
    $query = mysqli_query($con, $sql);

    if ($query && mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_array($query);
    } else {
        echo "No se encontraron datos para la cédula proporcionada.";
        exit();
    }
} else {
    echo "Cédula no proporcionada o es inválida.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar usuarios</title>
    <link rel="stylesheet" href="estilousuario.css">

</head>

<body>
    <div class="users-form">
        <form action="edit_empleados.php" method="POST">
            <input type="hidden" name="id_Empleado" value="<?= isset($row['id_Empleado']) ? $row['id_Empleado'] : '' ?>">
            <label for="rol">Rol:</label>
            <select name="rol" placeholder="rol">
                <?php
                foreach ($roles as $rolOption) {
                    $selected = ($rolOption['Nombre'] == $row['Rol']) ? 'selected' : '';
                    echo "<option value='" . $rolOption['Nombre'] . "' $selected>" . $rolOption['Nombre'] . "</option>";
                }
                ?>
            </select><br>

            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" placeholder="nombre" value="<?= isset($row['Nombre']) ? $row['Nombre'] : '' ?>"><br>

            <label for="contraseña">Contraseña:</label>
            <input type="text" name="contraseña" placeholder="contraseña" value="<?= isset($row['Contraseña']) ? $row['Contraseña'] : '' ?>"><br>

            

            <label for="telefono">Teléfono:</label>
            <input type="text" name="telefono" placeholder="telefono" value="<?= isset($row['Telefono']) ? $row['Telefono'] : '' ?>"><br>

            <input type="submit" value="Actualizar">
            <input type="reset" value="Cancelar">
        </form>
    </div>
</body>

</html>
