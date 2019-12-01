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
     
    <title>Dra.YazminNajera | Perfil</title>

    <?php include("navbar.php"); ?>
    <br>
  </head>

<body>
    <br>
    <?php
    include('Conexion.php');
    $temp = $_SESSION['id'];
    $instruccion = "SELECT * FROM Usuario WHERE idUsuario = '$temp'";
    if(! $resultado = $conexion -> query($instruccion)){
        echo "Ha sucedido un problema";
        exit();
    }
    while ($act = $resultado -> fetch_assoc()){
        $idUsuario = $act['idUsuario'];
        $tipo = $act['tipo_usuario'];
        $usuario = $act['usuario'];
        $nombre = $act['nombre'];
        $apPat = $act['apPat'];
        $apMat = $act['apMat'];
        $genero = $act['genero'];
        $f_nac = $act['f_nac'];
        $correo = $act['correo'];
        $telefono = $act['telefono'];
        $calle = $act['calle'];
        $no_ext = $act['no_ext'];
        $no_int = $act['no_int'];
        $colonia = $act['colonia'];
        $cp = $act['cp'];
        $foto = "Usuarios/Fotos/".$act['foto'];
        $especialidad = $act['especialidad'];
        $cedula = $act['cedula'];
        $rfc = $act['rfc'];
        $salario = $act['salario'];
        $curriculum = "Empleados/Curriculums/".$act['curriculum'];
        $localidad = $act['localidades_idlocalidades'];
?>  
    <div class="card mb-3 mx-auto" style="max-width: 80%;">
    <div class="row no-gutters">
        <div class="col-md-4">
        <form action="PerfilUsuarioPHP.php" method="post" enctype="multipart/form-data">
            <?php
                if ($foto == "Usuarios/Fotos/")
                    echo '<img src="img/perfil.png" class="card-img" alt="...">';
                else
                    echo '<img src='.$foto.' class="card-img" alt="...">'; 
            ?>
            <input type="file" class="form-control" id="foto" name="archivo">
        </div>
        <div class="col-md-8">
        <div class="card-body">
            <strong><h2 class="card-title"><?php echo $nombre. " ". $apPat. " ". $apMat;?></h2></strong>
            <p class="card-text">

                <small>Usuario: </small> <strong><?php echo $nombre; ?> </strong> <br>
                <small>Fecha de nacimiento: </small> <strong><?php echo $f_nac; ?> </strong> <br>
                <small>Género: </small> <strong> <?php  if ($genero == 'F') echo 'Femenino'; else echo 'Masculino';?> </strong><br>
                <? if ($tipo == 'M'){ ?>
                    <small>Especialidad: </small> <strong><?php echo $especialidad; ?> </strong> <br>
                    <small>Cedula: </small> <strong><?php echo $cedula; ?> </strong> <br>
                <? } if ($tipo == 'E'){?>
                    <small>Salario: </small> <strong><?php echo $salario; ?> </strong> <br>
                    <small>Curriculum: </small>
                    <?php
                        if ($curriculum == "Empleados/Curriculums/")
                            echo 'No hay archivo<br>';
                        else
                            echo '<a href='.$curriculum.' target="_blank">Descargar</a><br>';
                    ?>
                <?php } ?>

            </p>

                <input type="hidden" name="idUsuario" value="<?php echo $idUsuario; ?>">
                <input type="hidden" name="tipo" value="<?php echo $tipo; ?>">
                <div class="form-row mt-3">
                    <div class="form-group col-sm-12 col-md-6">
                        <p style="font-size:20px;color: rgba(144, 12, 52);">Correo: </p>
                        <input type="email" class="form-control" id="correo" name="correo" required value="<?php echo $correo;?>">
                    </div>

                    <div class="form-group col-sm-12 col-md-6">
                        <p style="font-size:20px;color: rgba(144, 12, 52);">Teléfono: </p>
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
                    <div class="form-group col-sm-12 col-md-4">
                        <p style="font-size:20px;color: rgba(144, 12, 52);">Localidad: </p>
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

                    <div class="form-group col-sm-6 col-md-4">
                        <p style="font-size:20px;color: rgba(144, 12, 52);">Fraccionamiento: </p>
                        <input type="text" class="form-control" id="colonia" name="colonia" required value="<?php echo $colonia;?>">
                    </div>

                    <div class="form-group col-sm-12 col-md-4">
                        <p style="font-size:20px;color: rgba(144, 12, 52);">Calle: </p>
                        <input type="text" class="form-control" id="calle" name="calle" required value="<?php echo $calle;?>">
                    </div>
                </div>

                <div class="form-row mt-3">
                    <div class="form-group col-sm-12 col-md-4">
                        <p style="font-size:20px;color: rgba(144, 12, 52);">No. ext: </p>
                        <input type="text" class="form-control" id="no_ext" name="no_ext" required value="<?php echo $no_ext;?>">
                    </div>

                    <div class="form-group col-sm-12 col-md-4">
                        <p style="font-size:20px;color: rgba(144, 12, 52);">No. int: </p>
                        <input type="text" class="form-control" id="no_int" name="no_int" value="<?php echo $no_int;?>">
                    </div>

                    <div class="form-group col-sm-12 col-md-4">
                        <p style="font-size:20px;color: rgba(144, 12, 52);">Cp: </p>
                        <input type="number" class="form-control" id="cp" name="cp" required value="<?php echo $cp;?>">
                    </div>
                </div>

                <div class="text-center">
                    <input  class = "btn btn-success" type="submit" value="Enviar" name = "btnEnviar">
                </div>
            </form>
            
        </div>
        </div>
        </div>
        </div>
    <?php } ?>
</body>
</html>
<?php include("footer.php"); ?>

