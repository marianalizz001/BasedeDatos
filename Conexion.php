<?php
    $conexion = new mysqli ('localhost','root','','Consultorio');
    if($conexion->connect_errno){
        echo "Error de conexion en la base de datos";
        exit();
    }
?>