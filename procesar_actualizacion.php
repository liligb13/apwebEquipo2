<?php
session_start();
include('conexion_be.php');

if (isset($_SESSION['usuario'])) {
    $usuario = $_SESSION['usuario'];
    // Recuperar los datos actualizados del formulario
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    // Actualizar la información del perfil en la base de datos
    $consulta = "UPDATE usuarios SET correo='$correo', contrasena='$contrasena' WHERE usuario='$usuario'";
    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado) {
        // Redirigir de vuelta a la página de perfil con un mensaje de éxito
        header("Location: home.php?actualizado=true");
        exit();
    } else {
        // Manejar el caso de error
        echo "Error al actualizar el perfil.";
    }
} else {
    // Manejar el caso de sesión no iniciada
    echo "Error: Sesión no iniciada.";
}
?>
