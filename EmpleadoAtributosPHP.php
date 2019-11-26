<?php
    include('Conexion.php');
    $nombre = $_REQUEST['nombre'];
    $nombre = str_replace(' ', '', $nombre);
    echo $nombre;

    $tipo = $_REQUEST['tipo'];
        
    $instruccion = ("ALTER TABLE Usuario ADD $nombre $tipo");
    $consulta = $conexion->prepare($instruccion);
    if($consulta->execute()){
        header('location: EmpleadoAlta.php'); 
    }else{
        $consulta->error;
    }
