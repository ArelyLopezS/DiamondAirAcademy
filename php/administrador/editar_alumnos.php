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
        $id_alumno = $_GET['id'];

        // Consulta para obtener los datos del alumno seleccionado
        $sql = "SELECT * FROM alumnos WHERE id = $id_alumno";
        $resultados = $conexion->query($sql);

        if ($resultados->num_rows > 0) {
            $alumno = $resultados->fetch_assoc();
            ?>
            <h1>Editar Alumno</h1>
            <form action="actualizar_alumno.php" method="post">
                <input type="hidden" name="id" value="<?php echo $alumno['id']; ?>">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" value="<?php echo $alumno['nombre']; ?>"><br>
                <label for="apellido">Apellido:</label>
                <input type="text" name="apellido" value="<?php echo $alumno['apellido']; ?>"><br>
                <label for="email">Email:</label>
                <input type="text" name="email" value="<?php echo $alumno['email']; ?>"><br>
                <button type="submit">Actualizar</button>
            </form>
        </div>
            <?php
        } else {
            echo "No se encontró el alumno con ID $id_alumno.";
        }
    } else {
        echo "ID de alumno no proporcionado.";
    }

    // Cerrar conexión
    $conexion->close();
    ?>
    
</body>
</html>
