<?php
    include("Conexion.php");
    $nombre_temp = $_FILES[ 'archivo' ][ 'name' ];
    $tmp = $_FILES[ 'archivo' ][ 'tmp_name' ];
    $tipoFile = $_FILES['archivo']['type'];
    $folder = 'Usuarios/Fotos';
    $nombre_foto = utf8_decode($nombre_temp);
    
    $tipo_usuario = 'P';
    $usuario = $_REQUEST['usuario'];
    $passwd = $_REQUEST['passwd'];
    $genero = $_REQUEST['genero'];
    $f_nac = $_REQUEST['f_nac'];
    $nombre = $_REQUEST['nombre'];
    $apPat = $_REQUEST['apPat'];
    $apMat = $_REQUEST['apMat'];
    $correo = $_REQUEST['correo'];
    $telefono = $_REQUEST['telefono'];
    $calle = $_REQUEST['calle'];
    $no_ext = $_REQUEST['no_ext'];
    $no_int = $_REQUEST['no_int'];
    $cp = $_REQUEST['cp'];
    $colonia = $_REQUEST['colonia'];
    $rfc = $_REQUEST['rfc'];
    $localidad = $_REQUEST['localidad'];

    if(($tipoFile == "image/jpg" || $tipoFile == "image/png" || $tipoFile == "image/gif" || $tipoFile == "image/jpeg")){ 
        if(move_uploaded_file($tmp,$folder.'/'.$nombre_foto))
            echo "Se ha grabado correctamente el archivo"; 
        else
            $nombre_foto = "";
    }
          
    $consulta= $conexion->prepare("Insert into vista_usuario (tipo_usuario, usuario, passwd, nombre, apPat, apMat, genero,
        f_nac, correo, telefono, calle, no_ext, no_int, colonia, cp, foto, rfc, localidades_idlocalidades) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $consulta->bind_param('sssssssssssssssssi',$tipo_usuario ,$usuario, md5($passwd), $nombre, $apPat, $apMat,$genero, $f_nac
        ,$correo, $telefono, $calle, $no_ext, $no_int, $colonia, $cp, $nombre_foto, $rfc, $localidad);
    
    if($consulta->execute()){
        header('location: PacienteAlta2.php?usuario='.$usuario.'');
    }else{
        echo $conexion -> error;
        echo "<script language=JavaScript>alert('Hubo un error');</script>";
    } 
    
?>