<?php
    
    include('Conexion.php');
    $idProducto = $_REQUEST['idProducto'];
    $consulta= $conexion->prepare("UPDATE producto SET activo='0' WHERE idProducto=?");
    $consulta->bind_param('s', $idProducto);

 	if($consulta->execute()){
			header('location: InventarioVer.php');
 	}else{
		echo "ERROOOOOOOOOOOOOOOR!";
        echo $conexion -> error;
    }

?>