<?php
    session_start();
    include('Conexion.php');

    $idUsuario= $_SESSION['id'];
    $idProducto= $_POST['idProducto'];
    //Recolectar los datos viejos de la tabla
    $consulta1="SELECT * FROM producto where idProducto=$idProducto";  

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
        }
    }
    //Actualizar tabla de producto
    $consulta= $conexion->prepare("UPDATE producto SET nombre=?, precio=?, existencia=?, Usuario_idUsuario=?, fecha=now() WHERE idProducto=$idProducto");
    $consulta->bind_param('sdii', $_REQUEST['nombre-producto'], $_REQUEST['precio'], $_REQUEST['existencia'],$idUsuario);

 	if($consulta->execute()){
        $consulta2= $conexion->prepare("INSERT INTO historial_inventario (Usuario_idUsuario, fecha_modificacion, producto_idProducto, existencia_actual, existencia_nueva, precio_actual, precio_nuevo) VALUES ($idUsuario, now(), $idProducto, $existencia, ?, $precio,?)");
        $consulta2->bind_param('id',  $_REQUEST['existencia'],$_REQUEST['precio']);
    
         if($consulta2->execute()){
                header('location: InventarioVer.php');
         }else{
            echo "ERROOOOOOOOOOOOOOOR!";
            echo $conexion -> error;
        }
 	}else{
		echo "ERROOOOOOOOOOOOOOOR!";
        echo $conexion -> error;
    }
    //Insertar todos los datos en la de historial

    
?>