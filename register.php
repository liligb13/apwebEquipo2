<?php
// Incluir el archivo de conexión a la base de datos
include('conexion_be.php');

// Variables para almacenar mensajes de alerta
$mensaje = '';
$tipo_alerta = '';

// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Verificar si se han enviado todos los campos del formulario
    if (isset($_POST['usuario']) && isset($_POST['correo']) && isset($_POST['contrasena'])) {
        // Verificar si los campos no están vacíos
        if (empty($_POST['usuario']) || empty($_POST['correo']) || empty($_POST['contrasena'])) {
            $mensaje = 'Por favor, complete todos los campos.';
            $tipo_alerta = 'error';
        } else {
            // Limpiar y validar los datos del formulario
            $usuario = trim($_POST['usuario']);
            $correo = trim($_POST['correo']);
            $contrasena = trim($_POST['contrasena']);

            // Insertar los datos en la base de datos
            $query = "INSERT INTO usuarios (usuario, correo, contrasena) VALUES ('$usuario', '$correo', '$contrasena')";
            $resultado = mysqli_query($conexion, $query);

            // Verificar si la inserción fue exitosa
            if ($resultado) {
                $mensaje = '¡Tu registro se ha completado exitosamente!';
                $tipo_alerta = 'success';
            } else {
                $mensaje = 'Ocurrió un error en el registro. Por favor, inténtalo de nuevo más tarde.';
                $tipo_alerta = 'error';
            }
        }
    } else {
        $mensaje = 'Ha ocurrido un error. Por favor, inténtalo de nuevo más tarde.';
        $tipo_alerta = 'error';
    }
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <!-- Agregar enlaces a los estilos CSS de Bootstrap o cualquier otro framework que estés utilizando -->
</head>
<body>
    <div class="container">
        <h1>Registro de Usuario</h1>
        <?php if (!empty($mensaje)): ?>
            <div class="alert alert-<?php echo $tipo_alerta; ?>" role="alert">
                <?php echo $mensaje; ?>
            </div>
        <?php endif; ?>
        <form action="register.php" method="post">
            <div class="form-group">
                <label for="usuario">Usuario:</label>
                <input type="text" class="form-control" id="usuario" name="usuario">
            </div>
            <div class="form-group">
                <label for="correo">Correo:</label>
                <input type="email" class="form-control" id="correo" name="correo">
            </div>
            <div class="form-group">
                <label for="contrasena">Contraseña:</label>
                <input type="password" class="form-control" id="contrasena" name="contrasena">
            </div>
            <button type="submit" class="btn btn-primary">Registrar</button>
        </form>
    </div>
    <!-- Agregar enlaces a los scripts JavaScript de Bootstrap o cualquier otro framework que estés utilizando -->
</body>
</html>
