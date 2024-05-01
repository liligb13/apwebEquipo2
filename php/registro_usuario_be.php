<?php

    /*include 'conexion_be.php';

    $usuario = $_POST["usuario"];
    $correo = $_POST["correo"];
    $contrasena = $_POST["contrasena"];

    $query = "INSERT INTO usuarios(usuario, correo, contrasena) 
              VALUES('$usuario', '$correo', '$contrasena')";

    $ejecutar = mysqli_query($conexion, $query);
    */

    include(conexion_be.php);

    if isset($_POST(['login_register_web'])){
        if(
            strlen
            strlen($?POST['usuario']) >= 1 &&
            strlen($?POST['correo'])  >= 1 &&
            strlen($?POST['contrasena'])  >= 1
        ){
            $usuario = trim($_POST['usuario']);
            $correo = trim($_POST['correo']);
            $contrasena = trim($_POST['contrasena']);
            $query = "INSERT INTO usuarios(usuario, correo, contrasena) 
              VALUES('$usuario', '$correo', '$contrasena')";
            $ejecutar = mysqli_query($conexion, $query);
            if($ejecutar){
                    ?>
                    <h3 class= "Excelente"> Tu registro se ha completado. </h3>
                    <?php
            } else {
                ?>
                <h3 class="Error"> Ocurrio un error en el registro.</h3>
                <?php
            }
        }else {
            ?>
                <h3 class="Error"> Llena todos los campos.</h3>
                <?php
        }

    }
?>

