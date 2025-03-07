<?php

if(isset($_POST["actualizar-ciclista"])){

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
    $imagen = "";

    $sql = "SELECT * FROM ciclista WHERE email = '$correo'";
    $resultadocorreo = $conexion->query($sql);
    $filas = $resultadocorreo->num_rows;

    if($filas > 0) {
        if(isset($_FILES["imagen-ciclista"])){
            $file = $_FILES["imagen-ciclista"];
            $nombre_foto = $file["name"];
            $tipo = $file["type"];
            $ruta_provisional = $file["tmp_name"];
            $carpeta = "assets/";

            if($tipo != 'image/jpg' && $tipo != 'image/png' && $tipo != 'image/jpeg' && $tipo != 'image/gif'){
                echo "<script>
                        alert('Tipo de imagen incorrecto');
                        window.location = 'ingresar_miembros.php';
                    </script>";
            } else {
                $src = $carpeta.$nombre_foto;
                move_uploaded_file($ruta_provisional, $src);
                $imagen ="asstes/".$nombre_foto;
                
            } 
        }
        $sqlupdate = "UPDATE ciclista SET 
            nombres='$nombre', 
            apellidos='$apellido', 
            telefono='$telefono', 
            fecha_nacimiento='$fecha_nacimiento', 
            pais='$pais', 
            referencia='$referencia', 
            tipo_carrera='$tipo_carrera', 
            nombre_carrera='$nombre_carrera', 
            pais_carrera='$pais_carrera', 
            imagen='$imagen' WHERE email='$correo'";
            
        if($conexion->query($sqlupdate) === TRUE) {
            echo "<script>
                    alert('Datos actualizados correctamente');
                    window.location = 'update.php';
                </script>";
        } else {
            echo "<script>
                    alert('Error al actualizar datos');
                    window.location = 'update.php';
                </script>";
        }
    } else {   
        echo "<script>
                alert('El ciclista no esta registrado');
                window.location = 'update.php';
            </script>";
    }
}

?>