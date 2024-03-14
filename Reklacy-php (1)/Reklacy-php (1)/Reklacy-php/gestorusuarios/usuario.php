<?php
include("../connection/connection.php");
$con = connection();

$sqlUsuarios = "SELECT * FROM tblUsuario";
$queryUsuarios = mysqli_query($con, $sqlUsuarios);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Usuarios</title>
</head>
<body><br><br><br><br><br><br><br><br><br><br>
<div class="users-form">
    <h2>Registrar Cliente</h2><br><br>
    <form action="insert_user.php" method="POST">
        <input type="text" name="id_usuario" placeholder="id_Usuario">
        <input type="text" name="nombre" placeholder="Nombre y Apellidos">
        <input type="text" name="correo" placeholder="Correo electronico">
        <input type="text" name="telefono" placeholder="Telefono">
        <input type="text" name="direccion" placeholder="Direccion">
        <input type="text" name="contraseña" placeholder="Contraseña">
        <input type="submit" value="Agregar usuario">
        <input type="reset" value="Eliminar">
    </form>
    <button type="button"> <a href="../principal/Usuario.html"> volver </a> </button>
   
</a>
</div>
</body>
</html>
