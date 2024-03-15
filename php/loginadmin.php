<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login - Diamond Air Academy</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Great+Vibes&family=Madimi+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Outfit&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

    <!-- Barra de Navegación -->
    <nav>
        <ul>
            <li><img src="../img/logodiamanre.png" alt="Logo de Diamond Air Academy" id="logo"></li>
            <li><a href="../html/index.html">Inicio</a></li>
            <li><a href="../html/nosotros.html">Nosotros</a></li>
            <li><a href="../html/eventos.html">Eventos</a></li>
            <li><a href="../html/contactanos.html">¡Contactanos!</a></li>
            <li><a href="../php/login.php">Iniciar Sesión</a></li>
        </ul>
    </nav>

    <!-- Contenido Principal -->
    <div id="iniciarsesion">
        <h1>Iniciar Sesión</h1>

        <?php
        // Agregar enlace para login administrador
        echo "<p>Ingresa con tu cuenta de Administrador.</p><p>¡Un gran líder es el que se esfuerza!</p>";

        // Verificar si el formulario ha sido enviado
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Incluir el archivo de conexión
            include('conexion.php');

            // Obtener la conexión
            $conexion = conectar();

            // Recuperar las credenciales del formulario
            $email = isset($_POST['email']) ? $_POST['email'] : '';
            $contrasena = isset($_POST['contrasena']) ? $_POST['contrasena'] : '';

            // Filtrar y escapar datos para evitar inyección SQL
            $email = mysqli_real_escape_string($conexion, $email);
            $contrasena = mysqli_real_escape_string($conexion, $contrasena);

            // Consultar la base de datos para verificar las credenciales
            $sql = "SELECT * FROM administradores WHERE email = '$email'";
            $resultados = $conexion->query($sql);

            if ($resultados) {
                $usuario = $resultados->fetch_assoc();
                if ($usuario && password_verify($contrasena, $usuario['contrasena'])) {
                    // Inicio de sesión exitoso, redirigir a menu.php
                    echo "<p>Bienvenido, $email!</p>";
                    header("Location: administrador/menu.php");
                    exit();
                } else {
                    // Credenciales incorrectas, mostrar un mensaje de error
                    echo "<p>Error: Credenciales incorrectas.</p>";
                }
            } else {
                // Manejar errores de consulta
                echo "<p>Error en la consulta: " . $conexion->error . "</p>";
            }

            // Cerrar conexión
            $conexion->close();
        }
        ?>

        <!-- Formulario de Inicio de Sesión -->
        <form action="loginadmin.php" method="post">
            <label for="email">Email:</label>
            <input type="email" name="email" required><br>
            <label for="contrasena">Contraseña:</label>
            <input type="password" name="contrasena" required><br>
            <button type="submit">Iniciar Sesión</button>


            
        </form>

        <?php
        // Agregar enlace para registro administrador
        echo "<p>¿Eres Estudiante? <a href='login.php'><br>¡Ingresa Aquí!</a></p>";
        ?>
    </div>

</body>
</html>
