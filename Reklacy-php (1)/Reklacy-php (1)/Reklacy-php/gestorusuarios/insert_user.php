<?php
include("../connection/connection.php");
$con = connection();

// Verificar la conexión a la base de datos
if (!$con) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Obtener los datos del formulario
$id_usuario = mysqli_real_escape_string($con, $_POST['id_usuario']);
$nombre = mysqli_real_escape_string($con, $_POST['nombre']);
$correo = mysqli_real_escape_string($con, $_POST['correo']);
$telefono = mysqli_real_escape_string($con, $_POST['telefono']);
$direccion = mysqli_real_escape_string($con, $_POST['direccion']);
$contraseña = password_hash($_POST['contraseña'], PASSWORD_DEFAULT); // Hasheamos la contraseña para mayor seguridad

// Verificar si el usuario ya existe
$checkUsuario = mysqli_query($con, "SELECT * FROM tblUsuario WHERE id_Usuario = '$id_usuario'");
if (!$checkUsuario) {
    die("Error de consulta: " . mysqli_error($con));
}

if (mysqli_num_rows($checkUsuario) == 0) {
    // Insertar el nuevo usuario
    $sql = "INSERT INTO tblUsuario (id_Usuario, Nombre, Correo, Telefono, Direccion, Contraseña) VALUES ('$id_usuario', '$nombre', '$correo', '$telefono', '$direccion', '$contraseña')";
    if (mysqli_query($con, $sql)) {
        echo("Usuario Registrado");
    } else {
        echo "Error al insertar usuario: " . mysqli_error($con);
    }
} else {
    echo "Error: El usuario con ID '$id_usuario' ya existe.";
}

// Cerrar la conexión a la base de datos
mysqli_close($con);
