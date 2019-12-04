<link href="css/sweetalert.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/functions.js"></script>
<script src="js/sweetalert.min.js"></script>

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
    $consulta->bind_param('siii', $_REQUEST['nombre-producto'], $_REQUEST['precio'], $_REQUEST['existencia'],$idUsuario);

 	if($consulta->execute()){
        $consulta2= $conexion->prepare("INSERT INTO historial_inventario (Usuario_idUsuario, fecha_modificacion, producto_idProducto, existencia_actual, existencia_nueva, precio_actual, precio_nuevo) VALUES ($idUsuario, now(), $idProducto, $existencia, ?, $precio,?)");
        $consulta2->bind_param('ii',  $_REQUEST['existencia'],$_REQUEST['precio']);
    
         if($consulta2->execute()){
            ?>
            <script>
            jQuery(function() {
                swal({   
                    title: "¡Bien!",   
                    text: "Se han borrado el producto",   
                    type: "success",    
                    confirmButtonColor: "#696565",   
                    confirmButtonText: "Ok",   
                    closeOnConfirm: false}, 

                    function(isConfirm){   
                        if (isConfirm) {     
                            window.location.href = "InventarioVer.php";
                        }
                    });
            });
            </script>
        <?php 
         }else{
            ?>
                <script>
                jQuery(function() {
                    swal({   
                        title: "¡Error!",   
                        text: "No se han actualizado los datos",   
                        type: "error",    
                        confirmButtonColor: "#DD6B55",   
                        confirmButtonText: "Intentar de nuevo",   
                        closeOnConfirm: false}, 
    
                        function(isConfirm){   
                            if (isConfirm) {     
                                window.location.href = "javascript:window.history.back()";
                            }
                        });
                });
                </script>
            <?php
        }
 	}else{
		?>
                <script>
                jQuery(function() {
                    swal({   
                        title: "¡Error!",   
                        text: "No se han actualizado los datos",   
                        type: "error",    
                        confirmButtonColor: "#DD6B55",   
                        confirmButtonText: "Intentar de nuevo",   
                        closeOnConfirm: false}, 
    
                        function(isConfirm){   
                            if (isConfirm) {     
                                window.location.href = "javascript:window.history.back()";
                            }
                        });
                });
                </script>
            <?php
    }
    //Insertar todos los datos en la de historial

    
?>