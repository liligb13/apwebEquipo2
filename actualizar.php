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
    <title>Actualizar Perfil</title>
</head>
<body>
    <h1>Actualizar Perfil</h1>
    <form action="procesar_actualizacion.php" method="post">
        <label for="correo">Correo electrónico:</label>
        <input type="email" id="correo" name="correo" value="<?php echo $row['correo']; ?>">
        <label for="contrasena">Contraseña:</label>
        <input type="password" id="contrasena" name="contrasena" value="<?php echo $row['contrasena']; ?>">
        <button type="submit">Actualizar</button>


        <a href="index.html">Página Principal</a>
    </form>
</body>
</html>
