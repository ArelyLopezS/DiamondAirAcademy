<?php
// Incluir el archivo de conexión
include('conexion.php');

// Obtener la conexión
$conexion = conectar();

// Verificar la sesión del estudiante
session_start();
if (!isset($_SESSION['id_alumno'])) {
    // Si no hay una sesión activa, redirigir al inicio de sesión
    header("Location: ../login.php");
    exit();
}

// Obtener el ID del estudiante de la sesión
$id_alumno = $_SESSION['id_alumno'];

// Consultar la base de datos para obtener los horarios del estudiante
$sql_horarios = "SELECT * FROM horarios WHERE idalumno = $id_alumno";
$resultados_horarios = $conexion->query($sql_horarios);

// Mostrar los horarios en una tabla
if ($resultados_horarios && $resultados_horarios->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>ID Clase</th>
                <th>Hora</th>
                <th>Días</th>
            </tr>";

    while ($fila = $resultados_horarios->fetch_assoc()) {
        echo "<tr>
                <td>{$fila['idclase']}</td>
                <td>{$fila['hora']}</td>
                <td>{$fila['dias']}</td>
              </tr>";
    }

    echo "</table>";
} else {
    // No hay horarios para este estudiante
    echo "<script>
            alert('No hay horarios disponibles para este estudiante.');
            window.location.href = 'menu.php';
          </script>";
}

// Cerrar conexión
$conexion->close();
?>
