<?php
    if(($_SESSION['log'] == true)){
        include ('Conexion.php');
    }else{
        header ('location: login.php');
    }
?>
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
    <br><br>
    <div class="container">
    <form action="EmpleadoEditarPHP.php" method="post" enctype="multipart/form-data">
        <p class="h4"> Editar Empleado</p><br>
<?php
    $idUsuario = $_GET['idUsuario'];
    include('Conexion.php');

    $instruccion = "SELECT idUsuario, f_alta, usuario, passwd, genero, nombre, apPat, apMat, f_nac, correo, telefono, foto, rfc, salario, curriculum, calle, no_ext, no_int, cp, colonia FROM Usuario WHERE idUsuario = '$idUsuario'";
    if(! $resultado = $conexion -> query($instruccion)){
        echo "Ha sucedido un problema";
        exit();
    }
    while ($act = $resultado -> fetch_assoc()){
        $idUsuario = $act['idUsuario'];
        $usuario = $act['usuario'];
        $passwd = $act['passwd'];
        $nombre = $act['nombre'];
        $apPat = $act['apPat'];
        $apMat = $act['apMat'];
        $correo = $act['correo'];
        $f_nac = $act['f_nac'];
        $telefono = $act['telefono'];
        $rfc = $act['rfc'];
        $salario = $act['salario'];
        $calle = $act['calle'];
        $no_ext = $act['no_ext'];
        $no_int = $act['no_int'];
        $cp = $act['cp'];
        $genero = $act['genero'];
        $colonia = $act['colonia'];
        $foto = "Empleados/Fotos/".$act['foto'];
        $curriculum = "Empleados/Curriculums/".$act['curriculum'];
?>

        <div class="form-row">

        <input type="hidden" name="idUsuario" value="<?php echo $idUsuario; ?>">
            <div class="form-group col-sm-6 col-md-4">
                <label for="usuario" style="font-size:20px;color: rgba(144, 12, 52);"> Usuario: </label>
                <input type="text" class="form-control" id="usuario" name="usuario" required value="<?php echo $usuario;?>">
            </div>

            <div class="form-group col-sm-6 col-md-4">
                <label for="passwd" style="font-size:20px;color: rgba(144, 12, 52);"> Contraseña: </label>
                <input type="text" class="form-control" id="passwd" name="passwd" required value="<?php echo $passwd;?>">
            </div>

            <div class="form-group col-sm-6 col-md-4">
                <label for="genero" style="font-size:20px;color: rgba(144, 12, 52);"> Género: </label><br>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="genero" id="genero" value="F" <?php echo ($genero == 'F') ? 'checked' : '' ?> >
                    <label class="form-check-label" for="exampleRadios1"> Femenino </label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="genero" id="genero" value="M" <?php echo ($genero == 'M') ? 'checked' : '' ?> >
                    <label class="form-check-label" for="exampleRadios2">Masculino</label>
                </div>
            </div>

        </div>

        <div class="form-row mt-2">
            <div class="form-group col-sm-6 col-md-4">
                <label for="nombre" style="font-size:20px;color: rgba(144, 12, 52);"> Nombre: </label>
                <input type="text" class="form-control" id="nombre" name="nombre" required value="<?php echo $nombre;?>">
            </div>

            <div class="form-group col-sm-6 col-md-4">
                <label for="apPat" style="font-size:20px;color: rgba(144, 12, 52);"> Apellido Paterno: </label>
                <input type="text" class="form-control" id="apPat" name="apPat" required value="<?php echo $apPat;?>">
            </div>

            <div class="form-group col-sm-6 col-md-4">
                <label for="apMat" style="font-size:20px;color: rgba(144, 12, 52);"> Apellido Materno: </label>
                <input type="text" class="form-control" id="apMat" name="apMat" value="<?php echo $apMat;?>">
            </div>

        </div>

        <div class="form-row mt-3">
            <div class="form-group col-sm-12 col-md-4">
                <label for="correo" style="font-size:20px;color: rgba(144, 12, 52);"> Correo: </label>
                <input type="email" class="form-control" id="correo" name="correo" required value="<?php echo $correo;?>">
            </div>

            <div class="form-group col-sm-12 col-md-4">
                <label for="telefono" style="font-size:20px;color: rgba(144, 12, 52);"> Teléfono: </label>
                <input type="number" class="form-control" id="telefono" name="telefono" required value="<?php echo $telefono;?>">
            </div>

            <div class="form-group col-sm-12 col-md-4">
                <label for="f_nac" style="font-size:20px;color: rgba(144, 12, 52);"> Fecha Nacimiento: </label>
                <input type="date" class="form-control" id="f_nac" name="f_nac" required value="<?php echo $f_nac;?>">
            </div>
        </div>
        
        <?php
            include('Conexion.php');
            $instruccion = "SELECT nombre FROM localidades";
            if(! $resultado = $conexion -> query($instruccion)){
                echo "Ha sucedido un problema";
                exit();
            }
        ?>

        <div class="form-row mt-3">
            <div class="form-group col-sm-12 col-md-4">
                <label for="calle" style="font-size:20px;color: rgba(144, 12, 52);"> Calle: </label>
                <input type="text" class="form-control" id="calle" name="calle" value="<?php echo $calle;?>" required>
            </div>

            <div class="form-group col-sm-12 col-md-1">
                <label for="calle" style="font-size:20px;color: rgba(144, 12, 52);"> No.Ext: </label>
                <input type="text" class="form-control" id="no_ext" name="no_ext" required value="<?php echo $no_ext;?>">
            </div>

            <div class="form-group col-sm-12 col-md-1">
                <label for="no_int" style="font-size:20px;color: rgba(144, 12, 52);"> No.Int: </label>
                <input type="text" class="form-control" id="no_int" name="no_int" value="<?php echo $no_int;?>">
            </div>

            <div class="form-group col-sm-12 col-md-2">
                <label for="no_int" style="font-size:20px;color: rgba(144, 12, 52);"> Cp: </label>
                <input type="number" class="form-control" id="cp" name="cp" required value="<?php echo $cp;?>">
            </div>

            <script>
                $(document).ready(function(){
                $("#colonia").val("<?php echo $colonia; ?>");
                });
            </script>

            <div class="form-group col-sm-6 col-md-4">
                <label for="fraccionamiento" style="font-size:20px;color: rgba(144, 12, 52);"> Fraccionamiento: </label>
                <select id="colonia" class="form-control" name="colonia">
                    <option selected>Selecciona ... </option>
                    <?php 
                            while ($act = $resultado -> fetch_assoc()){
                        ?>
                    <option value="<?php echo $act['nombre'];?>"><?php echo $act['nombre'];?></option>
                        <?php
                        }
                        ?>
                </select>
            </div>
        </div>

        <div class="form-row mt-3">
            <div class="form-group col-sm-12 col-md-3">
                <label for="no_int" style="font-size:20px;color: rgba(144, 12, 52);"> Fotografía: </label>
                <?php
                    if ($foto == "Empleados/Fotos/"){
                        echo '<img src="img/perfil.png" class="card-img" alt="...">';
                    }
                    else{
                        echo '<img src='.$foto.' class="card-img" alt="...">';
                    }
                ?>
                <input type="file" class="form-control" id="foto" name="archivo">
            </div>

            <div class="form-group col-sm-12 col-md-3">
                <label for="no_int" style="font-size:20px;color: rgba(144, 12, 52);"> Curriculum: </label>
                <?php
                    if ($curriculum == "Empleados/Curriculums/")
                        echo 'No hay archivo<br>';
                    else
                        echo '<a href='.$curriculum.' target="_blank">Descargar</a><br>';
                ?>
                <input type="file" class="form-control" id="curriculum" name="curriculum">
            </div>

            <div class="form-group col-sm-12 col-md-3">
                <label for="no_int" style="font-size:20px;color: rgba(144, 12, 52);"> RFC: </label>
                <input type="text" class="form-control" id="rfc" name="rfc" value="<?php echo $rfc;?>">
            </div>

            <div class="form-group col-sm-12 col-md-3">
                <label for="no_int" style="font-size:20px;color: rgba(144, 12, 52);"> Salario: </label>
                <input type="number" class="form-control" id="salario" name="salario" value="<?php echo $salario;?>">
            </div>
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

