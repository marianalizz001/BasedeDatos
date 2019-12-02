<?php
    session_start();
    include('Conexion.php');

    $idUsuario= $_SESSION['id'];
    $idProducto= $_POST['idProducto'];

    $consulta= $conexion->prepare("UPDATE producto SET nombre=?, precio=?, existencia=?, Usuario_idUsuario=?, fecha=now() WHERE idProducto=?");
    $consulta->bind_param('siiii', $_REQUEST['nombre-producto'], $_REQUEST['precio'], $_REQUEST['existencia'],$idUsuario,$idProducto);

 	if($consulta->execute()){
			header('location: InventarioVer.php');
 	}else{
		echo "ERROOOOOOOOOOOOOOOR!";
        echo $conexion -> error;
    }
?>