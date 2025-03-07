<?php

if(isset($_POST["registro"])){

    $cargo = mysqli_real_escape_string($conexion,$_POST['cargo']);
    $equipo = mysqli_real_escape_string($conexion,$_POST['equipo']);
    $nombre = mysqli_real_escape_string($conexion,$_POST['nombres']);
    $apellido = mysqli_real_escape_string($conexion,$_POST['apellidos']);
    $fecha_nacimiento = mysqli_real_escape_string($conexion,$_POST['fecha_nacimiento']);
    $sexo = mysqli_real_escape_string($conexion,$_POST['sexo']);
    $telefono = mysqli_real_escape_string($conexion,$_POST['telefono']);
    $correo = mysqli_real_escape_string($conexion,$_POST['email']);
    $pais = mysqli_real_escape_string($conexion,$_POST['pais']);
    $ciudad = mysqli_real_escape_string($conexion,$_POST['ciudad']);
    $direccion = mysqli_real_escape_string($conexion,$_POST['direccion']);
    $password = mysqli_real_escape_string($conexion,$_POST['password']);


    $sqlcorreo = "SELECT * FROM users WHERE email = '$correo'";
    $resultadocorreo = $conexion->query($sqlcorreo);
    $filas = $resultadocorreo->num_rows;
    $sqluser = "SELECT * FROM users WHERE nombre = '$nombre'";
    $resultadouser = $conexion->query($sqluser);
    $filas1 = $resultadouser->num_rows;

    if($filas || $filas1 >0) {
        echo "<script>
                alert('El usuario y/o correo ya existen');
                window.location = 'index.php';
            </script>";
    } else {   
        $sqlusuario = "INSERT INTO users (Cargo, Equipo, nombre, apellidos, fecha_nacimiento, sexo, telefono, email, pais, ciudad, direccion, contrasenia) VALUES ('$cargo','$equipo','$nombre','$apellido','$fecha_nacimiento', '$sexo', '$telefono', '$correo', '$pais', '$ciudad','$direccion','$password')";
        $resultadousuario = $conexion->query($sqlusuario);
        if ($resultadousuario > 0){
            echo "<script>
                    alert('Usuario registrado correctamente');
                    window.location = 'index.php';
                </script>";
        } else {
            echo "<script>
                    alert('Error al registrarse');
                    window.location = 'index.php';
                </script>";
        }
    }
}


?>