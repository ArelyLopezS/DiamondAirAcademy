<?php
// Incluir el archivo de conexión
include('conexion.php');

// Obtener la conexión
$conexion = conectar();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_admin = $_POST['id'];
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];

    // Actualizar los datos del alumno
    $sql = "UPDATE administradores SET nombre='$nombre', email='$email' WHERE id=$id_admin";

    if ($conexion->query($sql) === TRUE) {// Mostrar alerta en JavaScript
        echo "<script>alert('Datos actualizados correctamente'); window.location.href='administradores.php';</script>";
    } else {
        echo "Error al actualizar datos: " . $conexion->error;
    }
} else {
    echo "Acceso no válido.";
}

// Cerrar conexión
$conexion->close();
?>
