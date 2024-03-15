<?php
// Incluir el archivo de conexión
include('conexion.php');

// Obtener la conexión
$conexion = conectar();

if (isset($_GET['id'])) {
    $id_admin = $_GET['id'];

    // Consulta para obtener los datos del alumno antes de eliminarlo (opcional)
    $sql = "SELECT * FROM administradores WHERE id = $id_admin";
    $resultados = $conexion->query($sql);

    if ($resultados->num_rows > 0) {
        $alumno = $resultados->fetch_assoc();

        // Eliminar el alumno
        $sql_delete = "DELETE FROM administradores WHERE id = $id_admin";

        if ($conexion->query($sql_delete) === TRUE) {
            // Mostrar alerta en JavaScript
            echo "<script>alert('Administrador eliminado correctamente'); window.location.href='administradores.php';</script>";
        } else {
            echo "Error al eliminar administrador: " . $conexion->error;
        }
    } else {
        echo "No se encontró el aministrador con ID $id_admin.";
    }
} else {
    echo "ID de administrador no proporcionado.";
}

// Cerrar conexión
$conexion->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Eliminar Alumno - Diamond Air Academy</title>
    <link rel="stylesheet" href="../../css/styleadministrador.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Great+Vibes&family=Madimi+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Outfit&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="confirmacion-container">
        <h2>Confirmar Eliminación</h2>
        <p>¿Estás seguro de eliminar al alumno <?php echo "{$alumno['nombre']} {$alumno['apellido']} con ID {$alumno['id']}"; ?>?</p>
        <form action="confirmar_eliminacion.php" method="post">
            <input type="hidden" name="id" value="<?php echo $alumno['id']; ?>">
            <button type="submit">Sí, eliminar</button>
        </form>
        <a href="alumnos.php">Cancelar</a>
    </div>
</body>
</html>
