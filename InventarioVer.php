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

    <title>Dra.YazminNajera | Mensajes</title>

    <?php include("navbar.php"); ?>
    <br>

    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>

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
        <tbody class="buscar" style="padding-top: 40px; width:100%;">

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
                    echo'
                    <tr>    
                    
                        <td>' .$id_producto.'</td>
                        <td>' .$nombre.'</td>
                        <td>' .$existencia.'</td>
                        <td><i class="fas fa-dollar-sign"></i>   ' .$precio.'</td>
                        <td>' .$nombreUsuario.'</td>
                        <td>' .$fecha.'</td>
                        <td>'
        ?>
            
                        <form id="miFormulario1" action="InventarioBorrar.php" method="post">
                               <?php echo '<input type="hidden" name="idProducto" id="idProducto" value="'.$id_producto.'"> 
                            '?>
                            <button onclick=submit title="Borrar"><i class="fas fa-trash-alt"></i></button>
                        </form>
        <?php
        echo'
                        </td>
                        <td>'
        ?>
                        <form id="miFormulario2" action="InventarioEditar.php" method="post">
                                <?php echo '<input type="hidden" name="idProducto" id="idProducto" value="'.$id_producto.'">
                            '?>
                            <button onclick=submit title="Editar"><i class="fas fa-edit"></i></button>
                        </form>
        <?php
        echo'
                        </td>
                    </tr>';
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
<script src="js/jquery.slim.js"></script>
<script src="js/scripts.js"></script>