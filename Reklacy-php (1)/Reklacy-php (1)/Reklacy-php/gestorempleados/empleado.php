<?php
include("../connection/connection.php");
$con = connection();

$sqlEmpleados = "SELECT * FROM tblEmpleados";
$queryEmpleados = mysqli_query($con, $sqlEmpleados);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Empleados</title>
</head>
<body>
<div class="users-form">
    <h2>Registrar Empleado</h2> <br><br>
    <form action="insert_employee.php" method="POST">
        <input type="text" name="id_Empleado" placeholder="ID Empleado">
        <input type="text" name="Rol" placeholder="Rol">
        <input type="text" name="Nombre" placeholder="Nombre y Apellidos">
        <input type="password" name="Contraseña" placeholder="Contraseña">
        <input type="text" name="Telefono" placeholder="Telefono">
        <input type="submit" value="Agregar empleado">
        
        <button type="button"> <a href="../principal/principal.html"> volver </a> </button>
    </form>
</div><br><br><br><br>
<div class="users-table">
    <center>
    <h2>Empleados Registrados</h2><br><br>
    <table>
        <thead>
        <tr>
            <th>ID Empleado</th>
            <th>Rol</th>
            <th>Nombre</th>
            <th>Contraseña</th>
            <th>Telefono</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
    <?php
    while ($row = mysqli_fetch_array($queryEmpleados)) :
        ?>
        <center>
        <tr>
            <th><?= isset($row['id_Empleado']) ? $row['id_Empleado'] : 'N/A'; ?></th>
            <th><?= isset($row['Rol']) ? $row['Rol'] : 'N/A'; ?></th>
            <th><?= isset($row['Nombre']) ? $row['Nombre'] : 'N/A'; ?></th>
            <th><?= isset($row['Contraseña']) ? $row['Contraseña'] : 'N/A'; ?></th>
            <th><?= isset($row['Telefono']) ? $row['Telefono'] : 'N/A'; ?></th>
            <th><a href="update_employee.php?id_Empleado=<?= isset($row['id_Empleado']) ? $row['id_Empleado'] : ''; ?>" class="users-table--edit">  Editar</a></th>
            <th><a href="delete_employee.php?id_Empleado=<?= isset($row['id_Empleado']) ? $row['id_Empleado'] : ''; ?>" class="users-table--delete">  Eliminar</a></th>
        </tr>
        </center>
    <?php
    endwhile;
    
    ?>
    </tbody>
    </table>
</div>
</body>
</html>