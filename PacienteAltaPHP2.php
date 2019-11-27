<?php
    include("Conexion.php");
    
    $idUsuario = $_REQUEST['idUsuario'];
    //echo $idUsuario;

    $referido = $_REQUEST['referido'];
    $ultima_consulta = $_REQUEST['ultima_consulta'];
    $mot_consulta = $_REQUEST['mot_consulta'];
    $nombre = $_REQUEST['nombre'];
    $apPat = $_REQUEST['apPat'];
    $apMat = $_REQUEST['apMat'];
    $telefono = $_REQUEST['telefono'];

    $instruccion2 = ("Insert into Detalle_paciente (referido, mot_consulta, ult_consulta, contacto_emergencia_nombre,
    contacto_emergencia_apPat, 	contacto_emergencia_apMat, 	contacto_emergencia_num, Usuario_idUsuario) values (?,?,?,?,?,?,?,?)");
    $consulta2= $conexion->prepare($instruccion2);

    $consulta2->bind_param('sssssssi',$referido, $mot_consulta, $ultima_consulta, $nombre, $apPat, $apMat,$telefono, $idUsuario);
        
    if($consulta2->execute()){
        header('location: PacienteAlta3.php');
    }else{
        echo $conexion -> error;
        echo "<script language=JavaScript>alert('Hubo un error');</script>";
    } 
   
?>