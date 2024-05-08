<?php
session_start();
include('conexion_be.php');

if (isset($_SESSION['usuario'])) {
    $usuario = $_SESSION['usuario'];
    $consulta = "DELETE FROM usuarios WHERE usuario='$usuario'";
    mysqli_query($conexion, $consulta);
    session_destroy();
    header("Location: index.html");
    exit();
}
?>
