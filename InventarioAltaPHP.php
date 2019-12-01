<?php
    session_start();
     include('Conexion.php');

    $idUsuario= $_SESSION['id'];
 	$consulta= $conexion->prepare("insert into producto(nombre,precio,existencia,Usuario_idUsuario,fecha,activo) values (?,?,?,?,now(),'1')");
    
 	$consulta->bind_param('siii',$_REQUEST['nombre-producto'], $_REQUEST['precio'],$_REQUEST['existencia'],$idUsuario);

 	if($consulta->execute()){
		header('location: InventarioVer.php');
 	}else{	
        echo "ERROOOOOOOOOOOOOOOR!";
        echo $conexion -> error;
 	}
?>