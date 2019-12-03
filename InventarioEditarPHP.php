<?php
    session_start();
    include('Conexion.php');

    $idUsuario= $_SESSION['id'];
    $idProducto= $_POST['idProducto'];
    $consulta1="SELECT * FROM producto where idProducto=$idProducto";  
    echo $consulta1;  

    if(!$resultado=$conexion -> query($consulta1)){
        echo "Ha sucedido un problema ... ";
        exit();
    }else{
        while ($act = $resultado -> fetch_assoc()){
        $nombre = $act['nombre'];
        $precio = $act['precio'];
        $existencia = $act['existencia'];
        $fecha = $act['fecha'];
        $nombreUsuario=$act['nombreUsuario'];

        echo $nombre,", " ,$precio,", ",$existencia,", ",$fecha,", ",$nombreUsuario,".";
        }
    }
    

/*
    $consulta= $conexion->prepare("UPDATE producto SET nombre=?, precio=?, existencia=?, Usuario_idUsuario=?, fecha=now() WHERE idProducto=?");

    
    $consulta->bind_param('siiii', $_REQUEST['nombre-producto'], $_REQUEST['precio'], $_REQUEST['existencia'],$idUsuario,$idProducto);

 	if($consulta->execute()){
			header('location: InventarioVer.php');
 	}else{
		echo "ERROOOOOOOOOOOOOOOR!";
        echo $conexion -> error;
    }*/
?>