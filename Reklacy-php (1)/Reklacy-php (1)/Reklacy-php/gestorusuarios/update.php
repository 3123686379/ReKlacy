<?php
include("../connection/connection.php");
$con = connection();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar usuarios</title>
</head>

<body>
    <div class="users-form">
        <form action="edit_user.php" method="POST">
            <input type="hidden" name="id_Usuario" value="<?= isset($row['id_Usuario']) ? $row['id_Usuario'] : '' ?>">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" placeholder="nombre" value="<?= isset($row['Nombre']) ? $row['Nombre'] : '' ?>"><br>
            <label for="correo">Correo:</label>
            <input type="text" name="correo" placeholder="correo" value="<?= isset($row['Correo']) ? $row['Correo'] : '' ?>"><br>
            <label for="telefono">Teléfono:</label>
            <input type="text" name="telefono" placeholder="telefono" value="<?= isset($row['Telefono']) ? $row['Telefono'] : '' ?>"><br>
            <label for="Direccion">Direccion:</label>
            <input type="text" name="Direccion" placeholder="Direccion" value="<?= isset($row['Direccion']) ? $row['Direccion'] : '' ?>"><br>
            <label for="Direccion">Contraseña:</label>
            <input type="text" name="Contraseña" placeholder="Contraseña" value="<?= isset($row['Contraseña']) ? $row['Contraseña'] : '' ?>"><br>
            <input type="submit" value="Confirmar">
            <input type="reset" value="Cancelar">
        </form>
    </div>
</body>

</html>
