<?php
    // Incluir el archivo de conexión
    include('conexion.php');

    // Obtener la conexión
    $conexion = conectar();

    // Verificar si el formulario ha sido enviado
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Recuperar datos del formulario
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email = $_POST['email'];
        $contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT);

        // Insertar datos en la base de datos
        $sql = "INSERT INTO alumnos (nombre, apellido, email, contrasena) VALUES ('$nombre', '$apellido', '$email', '$contrasena')";

        // Después de procesar el registro
        if ($conexion->query($sql) === TRUE) {
            // Registro exitoso
            $mensaje = "Registro exitoso";
        } else {
            // Error en el registro
            $mensaje = "Error al registrar el usuario: " . $conexion->error;
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Alumnos - Diamond Air Academy</title>
    <link rel="stylesheet" href="../../css/styleadministrador.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Great+Vibes&family=Madimi+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Outfit&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

    <!-- Contenido Principal -->
    <div>
        <h1>Registrar Nueva Cuenta</h1>

        <?php if (isset($mensaje)) : ?>
            <p><?php echo $mensaje; ?></p>
        <?php endif; ?>

        <form action="registraralumnos.php" method="post">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" required><br>

            <label for="apellido">Apellido:</label>
            <input type="text" name="apellido" required><br>

            <label for="email">Correo electrónico:</label>
            <input type="email" name="email" required><br>

            <label for="contrasena">Contraseña:</label>
            <input type="password" name="contrasena" required><br>

            <button type="submit">Registrar</button>
        </form>

        <!-- Script JavaScript para mostrar el mensaje -->
        <script>
            // Obtener el mensaje desde el URL
            var urlParams = new URLSearchParams(window.location.search);
            var mensaje = urlParams.get('mensaje');
        
            // Verificar si hay un mensaje y mostrar la ventana emergente
            if (mensaje) {
                alert(mensaje);
            }
        </script>

        <a href="menu.php"><button>Regresar al Men&uacute;</button></a>
    </div>
</body>
</html>
