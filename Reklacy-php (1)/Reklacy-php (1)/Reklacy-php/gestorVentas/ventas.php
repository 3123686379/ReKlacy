<?php
// Include the database connection file
include("../connection/connection.php");
$con = connection();

// Fetch data from the tblVentas table
$sqlVentas = "SELECT * FROM tblVentas";
$queryVentas = mysqli_query($con, $sqlVentas);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css"> <!-- Ensure this file is present and contains necessary styles -->
    <title>Ventas</title>
</head>
<body>
    <div class="sales-form">
        <br><h2>Registrar Venta</h2><br><br><br>
        <!-- Add proper validation and sanitation for user inputs -->
        <form action="insert_sale.php" method="POST">
            <br><input type="text" name="id_Venta" placeholder="Id Venta"><br>
            <br><input type="text" name="Fecha" placeholder="Fecha"><br>
            <br><input type="text" name="id_Usuario" placeholder="Id Usuario"><br>
            <br><input type="text" name="id_Empleado" placeholder="Id Empleado"><br>
            <br><input type="text" name="total_Pagar" placeholder="Total a Pagar"><br>
            <br><input type="text" name="Peso" placeholder="Peso"><br>
            <br><input type="text" name="id_Material" placeholder="Id Material"><br>
            <br><br><br><input type="submit" value="Agregar Venta">
            <br><br><br><button type="button"> <a href="../principal/principal.html"> volver </a> </button>
            
        </form>
    </div>

    <div class="sales-table"><center>
        <br><br><br><h2>Ventas Registradas</h2><br><br><br>
        <table>
            <thead>
                <tr>
                    <th>ID Venta</th>
                    <th>Fecha</th>
                    <th>ID Usuario</th>
                    <th>ID Empleado</th>
                    <th>Total a Pagar</th>
                    <th>Peso</th>
                    <th>ID Material</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                
                <?php
                while ($row = mysqli_fetch_array($queryVentas)) :
                ?>  
                    <tr>
                        <center><td><?= isset($row['id_Venta']) ? $row['id_Venta'] : 'N/A'; ?></td>
                        <td><?= isset($row['Fecha']) ? $row['Fecha'] : 'N/A'; ?></td>
                        <td><?= isset($row['id_Usuario']) ? $row['id_Usuario'] : 'N/A'; ?></td>
                        <td><?= isset($row['id_Empleado']) ? $row['id_Empleado'] : 'N/A'; ?></td>
                        <td><?= isset($row['total_Pagar']) ? $row['total_Pagar'] : 'N/A'; ?></td>
                        <td><?= isset($row['Peso']) ? $row['Peso'] : 'N/A'; ?></td>
                        <td><?= isset($row['id_Material']) ? $row['id_Material'] : 'N/A'; ?></td>
                        <td><a href="update_sale.php?id_Venta=<?= isset($row['id_Venta']) ? $row['id_Venta'] : ''; ?>" class="sales-table--edit">Editar</a></td>
                        <td><a href="delete_sale.php?id_Venta=<?= isset($row['id_Venta']) ? $row['id_Venta'] : ''; ?>" class="sales-table--delete">Eliminar</a></td></center>
                    </tr>
                <?php
                endwhile;
                ?>
                
            </tbody>
        </table>
    </center>
    </div>
</body>
</html>
