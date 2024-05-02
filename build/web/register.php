

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
