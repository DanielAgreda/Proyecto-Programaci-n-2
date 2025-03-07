<?php

include("conexion/configuracion.php");
$conexion = new mysqli($server,$user,$pass,$db);
if (mysqli_connect_errno()) {
    echo "No conectado", mysql_connect_error();
    exit();
} 

?>