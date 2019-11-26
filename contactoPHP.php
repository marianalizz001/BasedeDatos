
<?php
	include("Conexion.php");

 	$consulta= $conexion->prepare("Insert into mensaje (nombre, apPat, apMat, correo, telefono, mensaje) values (?,?,?,?,?,?)");
 	$consulta->bind_param('ssssis',$_REQUEST['nombre'], $_REQUEST['apPat'],$_REQUEST['apMat'],$_REQUEST['correo'],$_REQUEST['telefono'],$_REQUEST['mensaje']);
		
 	if($consulta->execute()){
		header('location: contacto.php');
 	}else{	
        echo "ERROOOOOOOOOOOOOOOR!";
        echo $conexion -> error;
 	}
?>