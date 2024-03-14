<?php
// Include the database connection file
include("../connection/connection.php");
$con = connection();

// Fetch data from the tblMaterial table
$sqlMateriales = "SELECT * FROM material_usuario";
$queryMateriales = mysqli_query($con, $sqlMateriales);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css"> <!-- Ensure this file is present and contains necessary styles -->
    <title>Materiales</title>
</head>
<body>
    <div class="materials-form">
        <h2>Registrar Material</h2>
        <!-- Add proper validation and sanitation for user inputs -->
        <form action="insert_material_usuario.php" method="POST">
            <input type="text" name="Id" placeholder="Id del Usuario">
            <input type="text" name="nombre_material" placeholder="Nombre del Material">
            <input type="text" name="tipo_de_material" placeholder="Tipo de Material">
            <input type="text" name="cantidad" placeholder="Cantidad">
            <input type="submit" value="Agregar material">
            <button type="button"><a href="../principal/Usuario.html">Cerrar Sesion</a></button>
        </form>
    </div>


    
   
</body>
</html>






