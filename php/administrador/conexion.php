<?php
// Datos de conexión a la base de datos
$servidor = "localhost";
$usuario = "root";
$contrasena = "admin";
$base_datos = "diamondairacademy";

// Función para conectar a la base de datos
function conectar() {
    global $servidor, $usuario, $contrasena, $base_datos;

    $conexion = new mysqli($servidor, $usuario, $contrasena, $base_datos);

    // Verificar la conexión
    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    // Verificar y crear la tabla de alumnos si no existe
    verificarTabla($conexion, 'alumnos', 'CREATE TABLE alumnos (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL UNIQUE,
        contrasena VARCHAR(255) NOT NULL
    )');

    // Verificar y crear la tabla de administradores si no existe
    verificarTabla($conexion, 'administradores', 'CREATE TABLE administradores (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL UNIQUE,
        contrasena VARCHAR(255) NOT NULL
    )');

    return $conexion;
}

// Función para verificar y crear una tabla si no existe
function verificarTabla($conexion, $nombreTabla, $queryCreacion) {
    $query = "SHOW TABLES LIKE '$nombreTabla'";
    $result = $conexion->query($query);

    if ($result->num_rows == 0) {
        // La tabla no existe, la creamos
        if ($conexion->query($queryCreacion) === TRUE) {
            echo "La tabla '$nombreTabla' se ha creado correctamente.";
        } else {
            echo "Error al crear la tabla '$nombreTabla': " . $conexion->error;
        }
    }
}
?>
