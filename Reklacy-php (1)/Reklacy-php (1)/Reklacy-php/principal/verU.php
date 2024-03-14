
<?php

// Conexión a la BD
include("../connection/connection.php");
$con = connection();

// Consulta usuarios
$sqlUsuarios = "SELECT * FROM tblUsuario";
$queryUsuarios = mysqli_query($con, $sqlUsuarios);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Usuarios</title>
  <link rel="stylesheet" href="estilo_ver.css">
</head>

<body>

  <div class="users-table"><br><br><br>

    <h2>Clientes Registrados</h2>

    <table>
      <tr>
        <td>Cédula</td>
        <td>Nombre</td>
        <td>Correo</td>
        <td>Teléfono</td>
        <td>Dirección</td>
        <td></td>
        <td></td>
      </tr>
      

      <?php while ($row = mysqli_fetch_array($queryUsuarios)): ?>

      <tr>
        <td><?= isset($row['id_Usuario']) ? $row['id_Usuario'] : 'N/A'; ?></td>
        <td><?= isset($row['Nombre']) ? $row['Nombre'] : 'N/A'; ?></td>
        <td><?= isset($row['Correo']) ? $row['Correo'] : 'N/A'; ?></td>
        <td><?= isset($row['Telefono']) ? $row['Telefono'] : 'N/A'; ?></td>
        <td><?= isset($row['Direccion']) ? $row['Direccion'] : 'N/A'; ?></td>
        <td>
        
          <a href="../../gestorusuarios/edit_user.php?id_Usuario=<?= isset($row['id_Usuario']) ? $row['id_Usuario'] : ''; ?>" class="users-table--edit">
            Editar
          </a>
        </td>
        <td>
          <a href="../../gestorusuarios/delete_user.php?id_Usuario=<?= isset($row['id_Usuario']) ? $row['id_Usuario'] : ''; ?>" class="users-table--delete">
            Eliminar
          </a>
        </td>
      </tr>
      

      <?php endwhile; ?>
      

    </table>
    <button type="button"> <a href="../principal/principal.html"> volver </a> </button>
  </div>

</body>

</html>






















$conexion = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if (mysqli_connect_error()) {
    // Si hay un error en la conexión
    exit('Fallo en la conexión de MySQL: ' . mysqli_connect_error());
}

// Se valida si se ha enviado información, con la función isset()

// Evitar inyección SQL
if ($stmt = $conexion->prepare('SELECT id_Usuario, Contraseña FROM tblusuario WHERE id_Usuario = ?')) {
    // Parámetros de enlace de la cadena s
    $stmt->bind_param('s', $_POST['idUsuario']);
    $stmt->execute();
}

// Acá se valida si lo ingresado coincide con la base de datos
$stmt->store_result();
if ($stmt->num_rows > 0) {
    $stmt->bind_result($id_Usuario, $contrasena);
    $stmt->fetch();

    
    if ($_POST['password'] == $contrasena) {
        
        session_regenerate_id();
        $_SESSION['loggedin'] = TRUE;
        $_SESSION['name'] = $_POST['idUsuario'];
        $_SESSION['id'] = $id_Usuario;
        header('Location: ../../principal/principal.html');
    }
} 

$stmt->close();
?>.

















    




