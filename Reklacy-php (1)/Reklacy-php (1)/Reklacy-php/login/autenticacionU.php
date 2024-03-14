<?php
session_start();

// Credenciales de acceso a la base de datos
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'reklacy';

// Conexión a la base de datos
$conexion = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['idUsuario']) && !empty($_POST['password'])) {
        $id_Usuario = $_POST['idUsuario'];
        $contrasena = $_POST['password'];
        
        if ($conexion) {
        $sql = "SELECT * FROM tblusuario WHERE id_Usuario = '$id_Usuario' AND Contraseña = '$contrasena'";
        
        $resultado = mysqli_query($conexion, $sql);
        
        if (mysqli_num_rows($resultado) > 0) {
            header("Location:../gestormateriales/materiales.php"); 
            exit();
        } else {
            echo "Usuario o contraseña incorrectos";
        }
        } else {
        echo "Error en la conexión a la base de datos";
        }
    }
}
