//<?php
 	include("Conexion.php");
    include("loginPHP.php");
 	$consulta= $conexion->prepare("insert into producto(nombre,precio,existencia,Usuario_idUsuario,fecha) values (?,?,?,?,?)");
    $idUsuario = $_GET['idUsuario'];
    echo $idUsuario;
    $fecha=getdate();
 	$consulta->bind_param('siiid',$_REQUEST['nombre-producto'], $_REQUEST['precio'],$_REQUEST['existencia'],$idUsuario,$_REQUEST['fecha']);

 	if($consulta->execute()){
		header('location: inventario_alta.php');
 	}else{	
        echo "ERROOOOOOOOOOOOOOOR!";
        echo $conexion -> error;
 	}
?>