

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar material</title>
    <link rel="stylesheet" href="estilomaterial.css">
</head>

<body>
    <div class="materials-form">
        <form action="edit_material.php" method="POST">
            <input type="hidden" name="id_Material" value="<?= isset($row['id_Material']) ? $row['id_Material'] : '' ?>">
            
            <label for="nombre_Material">Nombre del Material:</label>
            <input type="text" name="nombre_Material" placeholder="Nombre del Material" value="<?= isset($row['nombre_Material']) ? $row['nombre_Material'] : '' ?>"><br>

            <label for="tipo_Material">Tipo de Material:</label>
            <input type="text" name="tipo_Material" placeholder="Tipo de Material" value="<?= isset($row['tipo_Material']) ? $row['tipo_Material'] : '' ?>"><br>

            <label for="Tarifa">Tarifa:</label>
            <input type="text" name="Tarifa" placeholder="Tarifa" value="<?= isset($row['Tarifa']) ? $row['Tarifa'] : '' ?>"><br>

            <label for="Peso">Peso:</label>
            <input type="text" name="Peso" placeholder="Peso" value="<?= isset($row['Peso']) ? $row['Peso'] : '' ?>"><br>

            <input type="submit" value="Actualizar">
            <input type="reset" value="Cancelar">
        </form>
    </div>
</body>

</html>
