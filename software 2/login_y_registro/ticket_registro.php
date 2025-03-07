<?php

if(isset($_POST['registro-ticket'])){

    $ticket = mysqli_real_escape_string($conexion, $_POST['ticket']);
    $descripcion = mysqli_real_escape_string($conexion, $_POST['ticket-descripcion']);

    $sqlticket = "SELECT * FROM ticket ";
    $resultado = $conexion->query($sqlticket);
    $rows = $resultado->num_rows;

    if ($rows > 0){
        echo "<script>
                alert('El ciclista ya esta registrado');
                window.location = 'ticket.php';
            </script>";
    } else {
        $sql = "INSERT INTO ciclista (titulo, descripcion) VALUES ('$ticket','$descripcion')";
        $resultadoticket = $conexion->query($sql);
        if ($resultadoticket > 0){
            echo "<script>
                    alert('Ciclista registrado correctamente');
                    window.location = 'ticket.php';
                </script>";
        } else {
            echo "<script>
                    alert('Error al registrar');
                    window.location = 'ticket.php';
                </script>";
        }
    }

}

?>