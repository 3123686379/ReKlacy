<?php
// Include the database connection file
include("../connection/connection.php");
$con = connection();

// Initialize $Id variable
$Id = '';

// Check if search form is submitted
if (isset($_POST['searchId'])) {
    $Id = $_POST['searchId'];
}

// Fetch data from the tblMaterial table
$sqlMateriales = "SELECT * FROM material_usuario";

// Check if $Id is not empty, then add WHERE clause to the SQL query
if (!empty($Id)) {
  $Id = mysqli_real_escape_string($con, $Id);
  $sqlMateriales .= " WHERE Id = '$Id'";  
}

$queryMateriales = mysqli_query($con, $sqlMateriales);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilomar.css"> <!-- Ensure this file is present and contains necessary styles -->
    <title>Materiales</title>
</head>
<body>
    <center>
    <div class="materials-form">
        <h2>Registrar Material</h2>
        <!-- Add proper validation and sanitation for user inputs -->
        <form action="insert_material.php" method="POST">
            <input type="text" name="id_Material" placeholder="Id Usuario">
            <input type="text" name="nombre_Material" placeholder="Nombre del Material">
            <input type="text" name="tipo_Material" placeholder="Tipo de Material">
            <input type="text" name="Tarifa" placeholder="Tarifa">
            <input type="text" name="Peso" placeholder="Peso">
            <input type="submit" value="agregar">
        </form>
    </div>
            
    <div class="users-table">
        <h2>Materiales Registrados</h2>
        <form action="" method="POST">
            <label for="searchId"> Buscar por Id: </label>
            <input type="text" name="searchId" id="searchId" value="<?= $Id ?>">
            <input type="submit" value="Buscar">
        </form>

        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre de Material</th>
                    <th>Tipo de Material</th>
                    <th>Cantidad</th>
                    <th>Tarifa</th>
                    <th>Peso</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
    
            <tbody>
                <?php while ($row = mysqli_fetch_array($queryMateriales)): ?>
                <tr>
                    <td><?= isset($row['Id']) ? $row['Id'] : 'N/A'; ?></td>
                    <td><?= isset($row['nombre_material']) ? $row['nombre_material'] : 'N/A'; ?></td>
                    <td><?= isset($row['tipo_de_material']) ? $row['tipo_de_material'] : 'N/A'; ?></td>
                    <td><?= isset($row['cantidad']) ? $row['cantidad'] : 'N/A'; ?></td>
                    <td><?= isset($row['tarifa']) ? $row['tarifa'] : 'N/A'; ?></td>
                    <td><?= isset($row['peso']) ? $row['peso'] : 'N/A'; ?></td>
                    <td>
                        <a href="edit_materialU.php?nombre_material=<?= isset($row['nombre_material']) ? $row['nombre_material'] : ''; ?>" class="users-table--edit">
                            Editar
                        </a>
                    </td>
                    <td>
                        <a href="delete_material.php?nombre_material=<?= isset($row['nombre_material']) ? $row['nombre_material'] : ''; ?>" class="users-table--delete">
                            Eliminar
                        </a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    
    </center><button type="button"> <a href="../principal/principal.html"> volver </a> </button>
</body>
</html>
