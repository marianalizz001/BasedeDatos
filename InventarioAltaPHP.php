<?php
    session_start();
     include('Conexion.php');

    $idUsuario= $_SESSION['id'];
 	$consulta= $conexion->prepare("insert into producto(nombre,precio,existencia,Usuario_idUsuario,fecha) values (?,?,?,?,now())");
    
 	$consulta->bind_param('siii',$_REQUEST['nombre-producto'], $_REQUEST['precio'],$_REQUEST['existencia'],$idUsuario);

 	if($consulta->execute()){
		header('location: inventario_alta.php');
 	}else{	
        echo "ERROOOOOOOOOOOOOOOR!";
        echo $conexion -> error;
 	}
?>