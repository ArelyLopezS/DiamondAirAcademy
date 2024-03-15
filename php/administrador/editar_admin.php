<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Menu - Diamond Air Academy</title>
    <link rel="stylesheet" href="../../css/styleadministrador.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Great+Vibes&family=Madimi+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Outfit&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div>
    <?php
    // Incluir el archivo de conexión
    include('conexion.php');

    // Obtener la conexión
    $conexion = conectar();

    if (isset($_GET['id'])) {
        $id_admin = $_GET['id'];

        // Consulta para obtener los datos del admin seleccionado
        $sql = "SELECT * FROM administradores WHERE id = $id_admin";
        $resultados = $conexion->query($sql);

        if ($resultados->num_rows > 0) {
            $admin = $resultados->fetch_assoc();
            ?>
            <h1>Editar Administrador</h1>
            <form action="actualizar_admin.php" method="post">
                <input type="hidden" name="id" value="<?php echo $admin['id']; ?>">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" value="<?php echo $admin['nombre']; ?>"><br>
                <label for="email">Email:</label>
                <input type="text" name="email" value="<?php echo $admin['email']; ?>"><br>
                <button type="submit">Actualizar</button>
            </form>
        </div>
            <?php
        } else {
            echo "No se encontró el admin con ID $id_admin.";
        }
    } else {
        echo "ID de admin no proporcionado.";
    }

    // Cerrar conexión
    $conexion->close();
    ?>
    
</body>
</html>
