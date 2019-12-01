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

<?php include('Conexion.php'); $idUsuario = $_GET['idUsuario']; ?>

<div class="accordion" id="accordionExample">
  <div class="card">
    <div class="card-header" id="uno">
      <h2 class="mb-0">
        <button class="btn btn-outline-secondary" type="button" style="width: 300px;"  data-toggle="collapse" data-target="#collapseuno" aria-expanded="false" aria-controls="collapseuno">
          H I S T O R I A  -  C L I N I C A
        </button>
      </h2>
    </div>

    <div id="collapseuno" class="collapse" aria-labelledby="headinguno" data-parent="#accordionExample">
      <div class="card-body">
          Aqui ponemos el PDF de la historia clinica
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-header" id="headingcuatro">
      <h2 class="mb-0">
        <button class="btn btn-outline-secondary" type="button" style="width: 300px;"  data-toggle="collapse" data-target="#collapsecuatro" aria-expanded="false" aria-controls="collapsecuatro">
          P E R F I L
        </button>
      </h2>
    </div>

    <div id="collapsecuatro" class="collapse" aria-labelledby="headingcuatro" data-parent="#accordionExample">
      <div class="card-body">
      <?php
    $instruccion = "SELECT  idUsuario, usuario, nombre, apPat, apMat, genero, f_nac, passwd, correo, telefono, foto, calle, no_ext, no_int, cp, colonia,localidades_idlocalidades FROM Usuario WHERE idUsuario = '$idUsuario'";
    if(! $resultado = $conexion -> query($instruccion)){
        echo "Ha sucedido un problema";
        exit();
    }
    while ($act = $resultado -> fetch_assoc()){
        $idUsuario = $act['idUsuario'];
        $usuario = $act['usuario'];
        $nombre = $act['nombre'];
        $apPat = $act['apPat'];
        $apMat = $act['apMat'];
        $genero = $act['genero'];
        $f_nac = $act['f_nac'];
        $passwd = $act['passwd'];
        $passwd = md5($passwd);

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
    <div class="card mb-3 mx-auto" style="max-width: 80%;">
    <div class="row no-gutters">
        <div class="col-md-4">
        <form action="PacientePerfilPHP.php" method="post" enctype="multipart/form-data">
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

                <small>Usuario: </small> <strong><?php echo $nombre; ?> </strong><br>
                <small>Fecha de nacimiento: </small> <strong><?php echo $f_nac; ?> </strong> <br>
                <small>Género: </small> <strong> <?php  if ($genero == 'F') echo 'Femenino'; else echo 'Masculino';?> </strong><br>
            </p>

                <input type="hidden" name="idUsuario" value="<?php echo $idUsuario; ?>">
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
      </div>
    </div>
  </div>


  <div class="card">
    <div class="card-header" id="headingdos">
      <h2 class="mb-0">
        <button class="btn btn-outline-secondary" type="button" style="width: 300px;"  data-toggle="collapse" data-target="#collapsedos" aria-expanded="false" aria-controls="collapsedos">
          C I T A S
        </button>
      </h2>
    </div>

    <div id="collapsedos" class="collapse" aria-labelledby="headingdos" data-parent="#accordionExample">
      <div class="card-body">
          
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-header" id="headingtres">
      <h2 class="mb-0">
        <button class="btn btn-outline-secondary" type="button" style="width: 300px;"  data-toggle="collapse" data-target="#collapsetres" aria-expanded="false" aria-controls="collapsetres">
          P A G O S
        </button>
      </h2>
    </div>

    <div id="collapsetres" class="collapse" aria-labelledby="headingtres" data-parent="#accordionExample">
      <div class="card-body">
          
      </div>
    </div>
  </div>
</div>
</body>
  
</html>
<?php include("footer.php"); ?>

