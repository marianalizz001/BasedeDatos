<?php

    include("Conexion.php");
    $idUsuario = $_REQUEST['idUsuario'];
    $passwd = $_REQUEST['passwd'];
    $correo = $_REQUEST['correo'];
    $telefono = $_REQUEST['telefono'];
    $localidad = $_REQUEST['localidad'];
    $calle = $_REQUEST['calle'];
    $no_ext = $_REQUEST['no_ext'];
    $no_int = $_REQUEST['no_int'];
    $cp = $_REQUEST['cp'];
    $colonia = $_REQUEST['colonia'];

    $nombre_archivo = $_FILES[ 'archivo' ][ 'name' ];
    $tmp = $_FILES[ 'archivo' ][ 'tmp_name' ];
    $tipoFile = $_FILES['archivo']['type'];
    $folder = 'Usuarios/Fotos';
    $nombre_foto = utf8_decode($nombre_archivo);

    if ($nombre_foto != ""){

        if(($tipoFile == "image/jpg" || $tipoFile == "image/png" || $tipoFile == "image/gif" || $tipoFile == "image/jpeg")){ 
            if(move_uploaded_file($tmp,$folder.'/'.$nombre_foto)){
                echo "Se ha grabado correctamente el archivo"; 
                $consulta= $conexion->prepare("UPDATE Usuario SET foto=? WHERE idUsuario=?");
                $consulta->bind_param('si', $nombre_foto, $idUsuario);
                if($consulta->execute()){
                        echo "si";
                }else{
                    echo "ERROOOOOOOOOOOOOOOR!";
                    echo $conexion -> error;
                }
            }else
                $nombre_foto = "";
        }
    }

 	$consulta= $conexion->prepare("UPDATE Usuario SET  passwd=?, correo=?, telefono=?, calle=?, no_ext=?, no_int=?, colonia=?, cp=?, foto=?, localidades_idlocalidades=? WHERE idUsuario=?");
    $consulta->bind_param('ssssssssssi',  md5($passwd),$correo, $telefono, $calle, $no_ext, $no_int, $colonia, $cp, $nombre_foto, $localidad, $idUsuario);

 	if($consulta->execute()){
			header('location: InicioPaciente.php');
 	}else{
		echo "ERROOOOOOOOOOOOOOOR!";
        echo $conexion -> error;
    }
?>


