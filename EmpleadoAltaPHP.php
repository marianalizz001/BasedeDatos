<?php
    include("Conexion.php");
    $nombre = $_FILES[ 'archivo' ][ 'name' ];
    $tmp = $_FILES[ 'archivo' ][ 'tmp_name' ];
    $tipoFile = $_FILES['archivo']['type'];
    $folder = 'Empleados/Fotos';
    $nombre_foto = utf8_decode($nombre);
    
    $nombre_cv = $_FILES[ 'curriculum' ][ 'name' ];
    $tmp_cv = $_FILES[ 'curriculum' ][ 'tmp_name' ];
    $tipoFile_cv = $_FILES['curriculum']['type'];
    $folder_cv = 'Empleados/Curriculums';
    $nombre_cv = utf8_decode($nombre_cv);


    $tipo_usuario = 'E';
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
    $salario = $_REQUEST['salario'];
    $localidad = $_REQUEST['localidad'];

   // echo $localidad;

    if(($tipoFile == "image/jpg" || $tipoFile == "image/png" || $tipoFile == "image/gif" || $tipoFile == "image/jpeg")){ 
        if(move_uploaded_file($tmp,$folder.'/'.$nombre_foto))
            echo "Se ha grabado correctamente el archivo"; 
        else
            $nombre_foto = "";
    }

    if ($tipoFile_cv == "application/vnd.openxmlformats-officedocument.wordprocessingml.document" || $tipoFile_cv == "application/pdf"){
        if(move_uploaded_file($tmp_cv,$folder_cv.'/'.$nombre_cv))
            echo "Se ha grabado correctamente el archivo"; 
        else
            $nombre_cv = "";
    }
          
    $consulta= $conexion->prepare("Insert into Usuario (tipo_usuario, usuario, passwd, nombre, apPat, apMat, genero,
        f_nac, correo, telefono, calle, no_ext, no_int, colonia, cp, foto, rfc, salario,curriculum, localidades_idlocalidades) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $consulta->bind_param('sssssssssssssssssssi',$tipo_usuario ,$usuario, md5($passwd), $nombre, $apPat, $apMat,$genero, $f_nac
        ,$correo, $telefono, $calle, $no_ext, $no_int, $colonia, $cp, $nombre_foto, $rfc, $salario, $nombre_cv, $localidad);
    
    if($consulta->execute()){
        header('location: EmpleadoVer.php');
    }else{
        echo $conexion -> error;
        echo "<script language=JavaScript>alert('Hubo un error');</script>";
    } 
    
?>