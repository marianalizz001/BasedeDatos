<?php
    include("Conexion.php");
    $idUsuario = $_REQUEST['idUsuario'];
    $passwd = $_REQUEST['passwd'];
    
 	$consulta= $conexion->prepare("UPDATE Usuario SET  passwd=? WHERE idUsuario=?");
    $consulta->bind_param('si', md5($passwd), $idUsuario);

 	if($consulta->execute()){
        header('location: PerfilUsuario.php');
 	}else{
		echo "ERROOOOOOOOOOOOOOOR!";
        echo $conexion -> error;
    }
?>


