<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="icon" href="img/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Anton|Dosis:400,800" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet"/>

    <link rel="stylesheet" href="css/style.css">
     
    <title>Dra.YazminNajera | Empleado</title>

    <?php include("navbar.php"); ?>
    <br>
  </head>

<body>
<div class="table-responsive">
    <table class="table table-hover">
        <thead class="thead-light">
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Producto</th>
                <th scope="col">Existencias</th>
                <th scope="col">Precio</th>
                <th scope="col">Usuario</th>
                <th scope="col">Fecha de modificación</th>
                <th scope="col">Eliminar</th>
                <th scope="col">Editar</th>
            </tr>
        </thead>
        <tbody style="padding-top: 40px; width:100%;">

        <?php
            include ('Conexion.php');
                            
            $instruccion = "SELECT a.idProducto,a.nombre,a.precio,a.existencia,a.fecha,a.activo,b.nombre as nombreUsuario FROM producto a, usuario b where a.Usuario_idUsuario=b.idUsuario";

            if(! $resultado = $conexion -> query($instruccion)){
                echo "Ha sucedido un problema ... ";
                exit();
            }
            while ($act = $resultado -> fetch_assoc()){
                if( $act['activo']=='1'){
                    
                    $id_producto = $act['idProducto'];
                    $nombre = $act['nombre'];
                    $precio = $act['precio'];
                    $existencia = $act['existencia'];
                    $fecha = $act['fecha'];
                    $nombreUsuario=$act['nombreUsuario'];
                    if($id_producto==$_GET['idProducto']){
                        echo'
                        <div class="form-row">
                            <tr id ="ieditar">    
                                <td>' .$id_producto.'</td>
                                <td><input type="text" class="form-control" id="nombre-producto" name="nombre-producto" value="'.$nombre.'"></td>
                                <td>' .$existencia.'</td>
                                <td>' .$precio.'</td>
                                <td>' .$nombreUsuario.'</td>
                                <td>' .$fecha.'</td>
                                <td><a href="">Listo <i class="fas fa-check-circle"></i></a></td>
                                <td><a href="InventarioVer.php">Cancelar <i class="fas fa-times-circle"></i></a></td>
                            </tr>
                        </div>';
                    }else{
                        echo'
                        <tr>    
                            <td>' .$id_producto.'</td>
                            <td>' .$nombre.'</td>
                            <td>' .$existencia.'</td>
                            <td>' .$precio.'</td>
                            <td>' .$nombreUsuario.'</td>
                            <td>' .$fecha.'</td>
                            <td><a href="InventarioBorrar.php?idProducto='.$id_producto.'"><i class="fas fa-trash-alt"></i></a></td>
                            <td><a href="InventarioEditar.php?idProducto='.$id_producto.'"><i class="fas fa-edit"></i></a></td>
                        </tr>';
                    }
                    
                }
                
            }
            $resultado -> free();  

        ?>
        
        </tbody>
    </table>
</div>
</body>
</html>
<?php include("footer.php"); ?>
