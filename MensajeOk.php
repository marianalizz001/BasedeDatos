<?php
    session_start(); 
    include("Conexion.php");
    $id_usuario = $_SESSION['id'];

    $id_mensaje = $_GET['id_mensaje'];

    $time = time();
    $fecha = date('Y-m-d', $time);
    
    $consulta =  $conexion->prepare("UPDATE mensaje SET visto='1', f_respuesta= '$fecha', usuario_id_usuario='$id_usuario' WHERE id_mensaje=?");
    $consulta->bind_param("i", $id_mensaje);
                      
    if($consulta->execute()){
        header('location: mensajes.php');
    }else{
    
        echo "ERROOOOOOOOOOOOOOOR!";
        echo $conexion -> error;
    }

?>
