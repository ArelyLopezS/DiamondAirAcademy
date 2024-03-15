<?php
// Incluir el archivo de conexión
include('conexion.php');

// Obtener la conexión
$conexion = conectar();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_alumno = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];

    // Actualizar los datos del alumno
    $sql = "UPDATE alumnos SET nombre='$nombre', apellido='$apellido', email='$email' WHERE id=$id_alumno";

    if ($conexion->query($sql) === TRUE) {// Mostrar alerta en JavaScript
        echo "<script>alert('Datos actualizados correctamente'); window.location.href='alumnos.php';</script>";
    } else {
        echo "Error al actualizar datos: " . $conexion->error;
    }
} else {
    echo "Acceso no válido.";
}

// Cerrar conexión
$conexion->close();
?>
