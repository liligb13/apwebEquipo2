<?php
session_start();
include('conexion_be.php');

if (isset($_SESSION['usuario'])) {
    $usuario = $_SESSION['usuario'];
    $consulta = "SELECT * FROM usuarios WHERE usuario='$usuario'";
    $resultado = mysqli_query($conexion, $consulta);
    $row = mysqli_fetch_assoc($resultado);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario</title>
</head>
<body>
    <h1>Perfil de Usuario</h1>
    <?php if (isset($row)): ?>
    <p>Nombre de usuario: <?php echo $row['usuario']; ?></p>
    <p>Correo electrónico: <?php echo $row['correo']; ?></p>
    <p>Contraseña: <?php echo $row['contrasena']; ?></p>    
    <?php else: ?>
    <p>No se pudo cargar la información del perfil.</p>
    <?php endif; ?>
    
    <a href="actualizar.php">Actualizar perfil</a>
    <a href="index.html">Página Principal</a>

    <button onclick="confirmarEliminar()">Eliminar cuenta</button>

<script>
function confirmarEliminar() {
    if (confirm("¿Estás seguro de que deseas eliminar tu cuenta?")) {
        window.location.href = "eliminar.php";
    }
}
</script>


</body>
</html>
