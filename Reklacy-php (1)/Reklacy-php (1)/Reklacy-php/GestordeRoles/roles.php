<?php

include("../connection/connection.php");

$con = connection();

$searchNombre = isset($_GET['searchNombre']) ? $_GET['searchNombre'] : '';

$sqlRoles = "SELECT * FROM tblRoles";

if (!empty($searchNombre)) {
  $searchNombre = mysqli_real_escape_string($con, $searchNombre);
  $sqlRoles .= " WHERE Nombre LIKE '%$searchNombre%'";  
}

$queryRoles = mysqli_query($con, $sqlRoles);
76

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="estiloroles.css">

  <title>Roles Crud</title>

  <style>
    body {
      background-color: rgb(90, 89, 89);
    }
  </style>

</head>

<body>

  <div class="users-form">
    <h2>Registrar Roles</h2>
    
    <form action="insert_rol.php" method="POST">
      <input type="text" name="Nombre" placeholder="Nombre">
      <input type="text" name="Descripcion" placeholder="Descripción">
      <input type="submit" value="Agregar Rol">
      <input type="reset" value="Limpiar">
    </form>
  

  <div class="users-table">
    <h2>Roles Registrados</h2>

    <form action="" method="GET">
      <label for="searchNombre">Buscar por Nombre:</label>
      <input type="text" name="searchNombre" id="searchNombre" value="<?= $searchNombre ?>">
      <input type="submit" value="Buscar">
    </form>

    <table>
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Descripción</th>
          <th></th>
          <th></th>
        </tr>
      </thead>
    
      <tbody>
        <?php while ($row = mysqli_fetch_array($queryRoles)): ?>
          <tr>
            <td><?= isset($row['Nombre']) ? $row['Nombre'] : 'N/A'; ?></td>
            <td><?= isset($row['Descripcion']) ? $row['Descripcion'] : 'N/A'; ?></td>
            <td>
              <a href="update_roles.php?Nombre=<?= isset($row['Nombre']) ? $row['Nombre'] : ''; ?>" class="users-table--edit">
                Editar
              </a>
            </td>
            <td>
              <a href="delete_roles.php?Nombre=<?= isset($row['Nombre']) ? $row['Nombre'] : ''; ?>" class="users-table--delete">
                Eliminar
              </a>
            </td>
          </tr>
          
        <?php endwhile; ?>
      </tbody>
    </table>
  </div><button type="button"> <a href="../principal/principal.html"> volver </a> </button>
  </div>

</body>
</html>