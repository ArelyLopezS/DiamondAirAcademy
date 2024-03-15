<!-- alumno.php -->
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
        <h1>Registros de Alumnos</h1>

        <?php
        // Incluir el archivo de conexión
        include('conexion.php');

        // Obtener la conexión
        $conexion = conectar();

        // Resto del código de ver_registros.php
        // ...

        // Consulta para obtener todos los registros
        $sql = "SELECT * FROM alumnos";
        $resultados = $conexion->query($sql);

        if ($resultados->num_rows > 0) {
            echo "<div id='tabla'>
                <table border='1'>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Email</th>
                        <th>Acciones</th>
                    </tr>
                    </div>";

            while ($fila = $resultados->fetch_assoc()) {
                echo "<tr>
                        <td>{$fila['id']}</td>
                        <td>{$fila['nombre']}</td>
                        <td>{$fila['apellido']}</td>
                        <td>{$fila['email']}</td>
                        <td>
                        <a href='editar_alumnos.php?id={$fila['id']}'>Editar</a> |
                        <a href='eliminar_alumnos.php?id={$fila['id']}'>Eliminar</a>
                        </td>
                    </tr>";
            }

            echo "</table>";
        } else {
            echo "No hay registros en la base de datos.";
        }

        // Cerrar conexión
        $conexion->close();
        ?>
    </div>

    <a href="menu.php"><button>Regresar al Men&uacute;</button></a>
</body>
</html>
