<?php
session_start();

// Verificar la sesión del estudiante
if (!isset($_SESSION['id_alumno'])) {
    // Si no hay una sesión activa, redirigir al inicio de sesión
    header("Location: ../login.php");
    exit();
}

// Almacenar el ID del alumno en una variable de sesión
$id_alumno = $_SESSION['id_alumno'];

// Redirigir a horarios.php pasando el ID del alumno como parámetro
header("Location: horarios.php?id_alumno=$id_alumno");
exit();
?>


?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Menu Administrador</title>
    <link rel="stylesheet" href="../../css/stylealumno-copy.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Great+Vibes&family=Madimi+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Outfit&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

<div>
<h1>Menu de Alumno</h1>
    <div class="button-container">
        <!-- Botones con imágenes -->
        <div class="menu-box">
            <img src="../../img/verregistro.png">
            <a href="horarios.php"><button>Horarios</button></a>
        </div>

        <div class="menu-box">
            <img src="../../img/verregistro.png">
            <a href="generadorqr.php"><button>Generar Qr's</button></a>
        </div>
        <div class="menu-box">
            <img src="../../img/verregistro.png">
            <a href="inicioencuestas.php"><button>Encuestas</button></a>
        </div>
    </div>
    <a href="../../html/index.html"><button>Salir de Sesión</button></a>
</div>
</body>
</html>
