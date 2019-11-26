<?php
    $conexion = new mysqli ('localhost','marianaac','Karma_150','consultorio2');
    if($conexion->connect_errno){
        echo "Error de conexion en la base de datos";
        exit();
    }
?>