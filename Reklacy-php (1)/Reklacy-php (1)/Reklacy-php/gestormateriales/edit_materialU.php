<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Incluye el archivo de conexión a la base de datos
    include("../connection/connection.php");
    $con = connection();

    // Verifica si los campos necesarios están presentes en $_POST
    if(isset($_POST['Id']) && isset($_POST['nombre_material']) && isset($_POST['tipo_de_material']) && isset($_POST['cantidad'])) {
        // Escapa los valores de $_POST para evitar inyección SQL
        $Id = mysqli_real_escape_string($con, $_POST['Id']);
        $nombre_material = mysqli_real_escape_string($con, $_POST['nombre_material']);
        $tipo_de_material = mysqli_real_escape_string($con, $_POST['tipo_de_material']);
        $cantidad = mysqli_real_escape_string($con, $_POST['cantidad']);

        // Preparar y ejecutar la consulta SQL para actualizar los datos
        $sql = "UPDATE material_usuario SET Id='$Id', nombre_material='$nombre_material', tipo_de_material='$tipo_de_material', cantidad='$cantidad' WHERE Id='$Id'";
        $query = mysqli_query($con, $sql);

        // Verificar si la consulta se ejecutó correctamente
        if ($query) {
            echo "Se editó el material exitosamente.";
            exit();
        } else {
            echo "Error al actualizar el material: " . mysqli_error($con);
        }
    } else {
        echo "Faltan parámetros necesarios.";
    }
} 
