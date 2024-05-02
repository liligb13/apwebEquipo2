<?php
// Incluir el archivo de conexiÃ³n a la base de datos
include('conexion_be.php');

// Variables para almacenar mensajes de alerta
$mensaje = '';
$tipo_alerta = '';

// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Verificar si se han enviado todos los campos del formulario
    if (isset($_POST['usuario']) && isset($_POST['correo']) && isset($_POST['contrasena'])) {
        // Verificar si los campos no estÃ¡n vacÃ­os
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

            // Verificar si la inserciÃ³n fue exitosa
            if ($resultado) {
                $mensaje = '¡Tu registro se ha completado exitosamente!';
                $tipo_alerta = 'success';
            } else {
                $mensaje = 'OcurriÃ³ un error en el registro. Por favor, intÃ©ntalo de nuevo mÃ¡s tarde.';
                $tipo_alerta = 'error';
            }
        }
    } else {
        $mensaje = 'Ha ocurrido un error. Por favor, intÃ©ntalo de nuevo mÃ¡s tarde.';
        $tipo_alerta = 'error';
    }
}
?>