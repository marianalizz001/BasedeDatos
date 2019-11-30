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
     
    <title>Dra.YazminNajera | Paciente</title>

    <?php include("navbar.php"); ?>
    <br>
  </head>

<body>
    <br><br>
    <div class="container">
    <form action="PacientePerfilPHP.php" method="post" enctype="multipart/form-data">
<?php
    include('Conexion.php');
    $temp = $_SESSION['id'];
    $instruccion = "SELECT  idUsuario, passwd, correo, telefono, foto, calle, no_ext, no_int, cp, colonia,localidades_idlocalidades FROM Usuario WHERE idUsuario = '$temp'";
    if(! $resultado = $conexion -> query($instruccion)){
        echo "Ha sucedido un problema";
        exit();
    }
    while ($act = $resultado -> fetch_assoc()){
        $idUsuario = $act['idUsuario'];
        $passwd = $act['passwd'];
        $correo = $act['correo'];
        $telefono = $act['telefono'];
        $localidad = $act['localidades_idlocalidades'];
        $foto = $act['foto'];
        $calle = $act['calle'];
        $no_ext = $act['no_ext'];
        $no_int = $act['no_int'];
        $cp = $act['cp'];
        $colonia = $act['colonia'];
        $foto = "Usuarios/Fotos/".$act['foto'];
?>

        <div class="form-row">

        <input type="hidden" name="idUsuario" value="<?php echo $idUsuario; ?>">
            <div class="form-group col-sm-12 col-md-4">
                <label for="correo" style="font-size:20px;color: rgba(144, 12, 52);"> Correo: </label>
                <input type="email" class="form-control" id="correo" name="correo" required value="<?php echo $correo;?>">
            </div>

            <div class="form-group col-sm-6 col-md-4">
                <label for="passwd" style="font-size:20px;color: rgba(144, 12, 52);"> Contraseña: </label>
                <input type="password" class="form-control" id="passwd" name="passwd" required value="<?php echo $passwd;?>">
            </div>

            <div class="form-group col-sm-12 col-md-4">
                <label for="telefono" style="font-size:20px;color: rgba(144, 12, 52);"> Teléfono: </label>
                <input type="number" class="form-control" id="telefono" name="telefono" required value="<?php echo $telefono;?>">
            </div>
        </div>
    
        <div class="form-row mt-3">
            <?php
                include('Conexion.php');
                $instruccion = "SELECT idlocalidades, nombre FROM localidades";
                if(! $resultado = $conexion -> query($instruccion)){
                    echo "Ha sucedido un problema";
                    exit();
                }
            ?>
            <div class="form-group col-sm-12 col-md-3">
                <label for="localidad" style="font-size:20px;color: rgba(144, 12, 52);"> Localidad: </label>
                <script>
                            $(document).ready(function(){
                            $("#localidad").val("<?php echo $localidad; ?>");
                            });
                </script>
                <select id="localidad" class="form-control" name="localidad" required>
                    <option selected>Selecciona ... </option>
                    <?php 
                            while ($act = $resultado -> fetch_assoc()){
                        ?>
                    <option value="<?php echo $act['idlocalidades'];?>"><?php echo $act['nombre'];?></option>
                        <?php
                        }
                        ?>
                </select>
            </div>

            <div class="form-group col-sm-6 col-md-3">
                <label for="fraccionamiento" style="font-size:20px;color: rgba(144, 12, 52);"> Fraccionamiento: </label>
                <input type="text" class="form-control" id="colonia" name="colonia" required value="<?php echo $colonia;?>">
            </div>

            <div class="form-group col-sm-12 col-md-3">
                <label for="calle" style="font-size:20px;color: rgba(144, 12, 52);"> Calle: </label>
                <input type="text" class="form-control" id="calle" name="calle" required value="<?php echo $calle;?>">
            </div>

            <div class="form-group col-sm-12 col-md-1">
                <label for="calle" style="font-size:20px;color: rgba(144, 12, 52);"> No.Ext: </label>
                <input type="text" class="form-control" id="no_ext" name="no_ext" required value="<?php echo $no_ext;?>">
            </div>

            <div class="form-group col-sm-12 col-md-1">
                <label for="no_int" style="font-size:20px;color: rgba(144, 12, 52);"> No.Int: </label>
                <input type="text" class="form-control" id="no_int" name="no_int" value="<?php echo $no_int;?>">
            </div>

            <div class="form-group col-sm-12 col-md-1">
                <label for="no_int" style="font-size:20px;color: rgba(144, 12, 52);"> Cp: </label>
                <input type="number" class="form-control" id="cp" name="cp" required value="<?php echo $cp;?>">
            </div>
        </div>


        <div class="form-row mt-3">
        <div class="form-group col-sm-12 col-md-4"></div>
            <div class="form-group col-sm-12 col-md-4">
                <label for="no_int" style="font-size:20px;color: rgba(144, 12, 52);"> Fotografía: </label>
                <?php
                    if ($foto == "Usuarios/Fotos/"){
                        echo '<img src="img/perfil.png" class="card-img" alt="...">';
                    }
                    else{
                        echo '<img src='.$foto.' class="card-img" alt="...">';
                    }
                ?>
                <input type="file" class="form-control" id="foto" name="archivo">
            </div>
        <div class="form-group col-sm-12 col-md-4"></div>
        </div>
        <br>
        <div class="text-center">
            <input  class = "btn btn-success" type="submit" value="Enviar" name = "btnEnviar">
        </div>
        <br>
        <?php
    }
    ?>
    </form>
</div>
</body>
</html>
<?php include("footer.php"); ?>

