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
    if (!empty($_POST['idEmpleado']) && !empty($_POST['password'])) {
        $id_Empleado = $_POST['idEmpleado'];
        $contrasena = $_POST['password'];
        
        if ($conexion) {
        $sql = "SELECT * FROM tblempleados WHERE id_Empleado = '$id_Empleado' AND Contraseña = '$contrasena'";
        
        $resultado = mysqli_query($conexion, $sql);
        
        if (mysqli_num_rows($resultado) > 0) {
            header("Location: ../principal/principal.html"); 
            exit();
          } else {
            echo "Usuario o contraseña incorrectos";
        }
        } else {
        echo "Error en la conexión a la base de datos";
        }
    }
}
?>