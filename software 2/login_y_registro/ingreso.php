<?php

if(isset($_POST["registrar-ciclista"])){

    $nombre = mysqli_real_escape_string($conexion,$_POST['nombres']);
    $apellido = mysqli_real_escape_string($conexion,$_POST['apellidos']);
    $correo = mysqli_real_escape_string($conexion,$_POST['correo']);
    $telefono = mysqli_real_escape_string($conexion,$_POST['telefono']);
    $fecha_nacimiento = mysqli_real_escape_string($conexion,$_POST['fecha_nacimiento']);
    $pais = mysqli_real_escape_string($conexion,$_POST['pais_origen']);
    $referencia = mysqli_real_escape_string($conexion,$_POST['referencia_cicla']);
    $tipo_carrera = mysqli_real_escape_string($conexion,$_POST['tipo_carrera']);
    $nombre_carrera = mysqli_real_escape_string($conexion,$_POST['nombre_carrera']);
    $pais_carrera = mysqli_real_escape_string($conexion,$_POST['pais_carrera']);
    $imagen = $_FILES['imagen-ciclista']['name'];

    $sqlcorreo = "SELECT * FROM ciclista WHERE email = '$correo'";
    $resultadocorreo = $conexion->query($sqlcorreo);
    $filas = $resultadocorreo->num_rows;

    if($filas > 0) {
        echo "<script>
                alert('El ciclista ya esta registrado');
                window.location = 'ingresar_miembros.php';
            </script>";
    } else {
        if(isset($imagen) && $imagen != ""){
            $tipo = $_FILES['imagen-ciclista']['type'];
            $temp = $_FILES['imagen-ciclista']['tmp_name'];

            if(!((strpos($tipo,'gift') || strpos($tipo,'jpeg') || strpos($tipo,'web') || strpos($tipo, 'jpg') || strpos($tipo, 'png')))){
                echo "<script>
                        alert('Tipo de imagen incorrecto');
                        window.location = 'ingresar_miembros.php';
                    </script>";
            } else {
                $sqlusuario = "INSERT INTO ciclista (nombres, apellidos, email, telefono, fecha_nacimiento, pais, referencia, tipo_carrera, nombre_carrera, pais_carrera, imagen) VALUES ('$nombre','$apellido','$correo','$telefono','$fecha_nacimiento', '$pais', '$referencia', '$tipo_carrera', '$nombre_carrera', '$pais_carrera', '$imagen')";
                $resultadousuario = $conexion->query($sqlusuario);
                if ($resultadousuario > 0){
                    move_uploaded_file($temp,'assets/'.$imagen);
                    echo "<script>
                            alert('Ciclista registrado correctamente');
                            window.location = 'ingresar_miembros.php';
                        </script>";
                } else {
                    echo "<script>
                            alert('Error al registrar');
                            window.location = 'ingresar_miembros.php';
                        </script>";
                }
            }
        }
    } 
}

?>