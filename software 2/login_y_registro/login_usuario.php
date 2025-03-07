<?php

if (isset($_POST["login"])){
    $correo = mysqli_real_escape_string($conexion,$_POST['correo']);
    $password = mysqli_real_escape_string($conexion,$_POST['pass']);
    $sql = "SELECT * FROM users WHERE email = '$correo'";
    $resultado = $conexion->query($sql);
    $rows= $resultado->num_rows;

    $sql1 = "SELECT * FROM users WHERE contrasenia = '$password'";
    $resultado1 = $conexion->query($sql1);
    $rows1= $resultado1->num_rows;

    if (($rows && $rows1) > 0){
        $row = $resultado->fetch_assoc();
        $row1 = $resultado1->fetch_assoc();
        if ($correo === 'admin@gmail.com' && $password === 'admin123'){
            echo "<script>
                window.location = 'admin.php';
            </script>";
        } else {
            echo "<script>
                window.location = 'usuario.php';
            </script>";
        }
        
    } else {
        echo "<script>
                alert('Usuario o contraseña incorrectos');
                window.location = 'inicio sesion.php';
            </script>";
    }
}

?>  