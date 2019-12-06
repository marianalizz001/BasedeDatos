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
    
    
    <br>

    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
        $("#myBtn").click(function(){
            $("#myModal").modal();
        });
        });
    </script>

  </head>

<body>
<?php
    session_start(); 
    include ('Conexion.php');
?>

<link href="https://fonts.googleapis.com/css?family=Oxygen&display=swap" rel="stylesheet">

<nav class="navbar navbar-expand-lg fixed-top navbar-light" style="background-color: rgba(85, 219, 183, 0.83);">
  <i class="fa fa-arrow-circle-left fa-2x" aria-hidden="true" onclick="history.back()" style="color: darkcyan; padding-right: 10px;"></i>
  <a class="float-right" class="navbar-brand" href="index.php"><img src="img/logo.png" width="180" height="50" alt=""></a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarCollapse">
    <ul class="navbar-nav ml-auto" id="ejm2">

    <!-- MENU GENERAL -->

    <?php if (!isset($_SESSION['usuario']) || ($_SESSION['log'] == false)){ ?>
      <li class="nav-item active" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse">
        <a class="nav-link" href="index.php"><h5>Inicio</h5><span class="sr-only">(current)</span></a>
      </li>

      <li class="nav-item" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse">
        <a class="nav-link" href="nosotros.php"><h5>Nosotros</h5><span class="sr-only">(current)</span></a>
      </li>
    
      <li class="nav-item" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse">
        <a class="nav-link" href="servicios.php"><h5>Servicios</h5><span class="sr-only">(current)</span></a>
      </li>

      <li class="nav-item" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse">
        <a class="nav-link" href="contacto.php"><h5>Contacto</h5><span class="sr-only">(current)</span></a>
      </li>
    
      <!--<li class="nav-item" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse">
        <a class="nav-link" href="AgendarCitaGeneral.php"><h5>Agendar Cita</h5><span class="sr-only">(current)</span></a>
      </li>-->

      <li class="nav-item"  data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse">
        <a class="nav-link" href="ayuda.php"><i class="fa fa-question-circle fa-2x" style="color: darkcyan;" aria-hidden="true"></i></a>
      </li>

      <li class="nav-item"  data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse">
        <a class="nav-link" href="login.php"><i class="fa fa-user fa-2x" style="color: darkcyan;" aria-hidden="true"></i></a>
      </li>
    <?php }elseif (isset($_SESSION['usuario']) && ($_SESSION['log'] == true)) { ?>
<!-- MENU CON LOGIN -->
    <?php if ($_SESSION['tipo'] == 'M' || $_SESSION['tipo'] == 'E' || $_SESSION['tipo'] == 'P'){ ?>
      <li class="nav-item active" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse">
        <a class="nav-link" href="Inicio.php"><h5>Inicio</h5><span class="sr-only">(current)</span></a>
      </li>

      <li class="nav-item active" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse">
        <a class="nav-link" href="PerfilUsuario.php"><h5>Perfil</h5><span class="sr-only">(current)</span></a>
      </li>

    <?php } ?>

    <?php if (($_SESSION['tipo'] == 'M') || ($_SESSION['tipo'] == 'E')){ ?>
      <li class="nav-item active" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse">
        <a class="nav-link" href="mensajes.php"><h5>Mensajes</h5><span class="sr-only">(current)</span></a>
    </li>
    
      <li class="nav-item dropdown" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse">
        <a class="nav-link" href="Citas.php" role="button" style="font-size:18px;color:white;">
          Citas
        </a>
      </li>

      <li class="nav-item dropdown" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size:18px;color:white;">
          Paciente
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" id="submenu">
          <a class="dropdown-item" href="PacienteVer.php">Ver</a>
          <a class="dropdown-item" href="PacienteAlta.php">Alta</a>
        </div>
      </li>
      <?php } ?>

      <?php if ($_SESSION['tipo'] == 'M'){ ?>
      <li class="nav-item dropdown" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size:18px;color:white;">
          Empleado
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" id="submenu">
          <a class="dropdown-item" href="EmpleadoVer.php">Ver</a>
          <a class="dropdown-item" href="EmpleadoAlta.php">Alta</a>
        </div>
      </li>

      <li class="nav-item dropdown" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size:18px;color:white;">
          Inventario
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" id="submenu">
          <a class="dropdown-item" href="InventarioVer.php">Listado</a>
          <a class="dropdown-item" href="InventarioAlta.php">Agregar</a>
        </div>
      </li>

      <li class="nav-item dropdown" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size:18px;color:white;">
          Estadísticas
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" id="submenu">
          <a class="dropdown-item" href="estadisticaGenero.php">Genero</a>
          <a class="dropdown-item" href="estadisticaEdad.php">Edad</a>
          <a class="dropdown-item" href="estadisticaCitas.php">Citas Semanales</a>
          <a class="dropdown-item" href="estadisticaPago.php">Pagos Semanales</a>
        </div>
      </li>

      <li class="nav-item dropdown" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size:18px;color:white;">
          Reportes
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" id="submenu">
          <a class="dropdown-item" href="Reportes/MsgContestados.php" target="_blank">Msg Contestados</a>
          <a class="dropdown-item" href="Reportes/MsgPendientes.php" target="_blank">Msg Pendientes</a>
          <a class="dropdown-item" href="Reportes/ListadoEmpleados.php" target="_blank">Empleados</a>
          <a class="dropdown-item" href="Reportes/HistorialProductos.php" target="_blank">Inventario</a> 
          <a class="dropdown-item" href="Reportes/PacientesBaja.php" target="_blank">Pacientes Baja</a>          
        </div>
      </li>

      <li class="nav-item dropdown" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size:18px;color:white;">
          Atributos
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" id="submenu">
          <a class="dropdown-item" href="AtributoAgregar.php">Agregar</a>
          <a class="dropdown-item" href="AtributoEditar.php" >Editar</a>
          <a class="dropdown-item" href="AtributoEliminar.php">Eliminar</a>         
        </div>
      </li>

      

      <?php } ?>

      <?php if ($_SESSION['tipo'] == 'P'){ ?>
        <li class="nav-item dropdown" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size:18px;color:white;">
          Citas
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" id="submenu">
          <a class="dropdown-item" href="CitaVer.php">Agendar</a>
          <a class="dropdown-item" href="#">Historial</a>
        </div>
      </li>

        <li class="nav-item active" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse">
          <a class="nav-link" href="Inicio.php"><h5>Saldo</h5><span class="sr-only">(current)</span></a>
        </li>
      <?php } ?>

      <li class="nav-item">
        <a class="nav-link" href="logout.php"><span><i class="fas fa-sign-out-alt fa-2x" style="color: darkcyan;"></i></span></a>
      </li>

  <?php } ?>

   </div>
</nav>


<br><br>

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

<div class style="padding-left: 100px; padding-right: 200px;"> 
    <div class="row">
    <!-- The Modal -->
        <div class="modal fade" id="myModal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Cambiar contraseña</h4>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <form action="CambiarPasswd.php" method="post">
                    <div class="form-group">
                        <p style="font-size:20px;color: rgba(144, 12, 52);">Nueva Contraseña: </p>
                        <input type="hidden" name="idUsuario" value="<?php echo $idUsuario; ?>">
                        <input type="password" class="form-control"  name="passwd" required>
                    </div>     
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <input  class = "btn btn-success" type="submit" value="Aceptar" name = "btnEnviar">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    </div>
     </div>

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
                    <button type="button" class="btn btn-warning"  id="myBtn">Cambiar contraseña</button>
                    <input  class = "btn btn-success" type="submit" value="Enviar" name = "btnEnviar">
                </div>
            </form>
            
        </div>
        </div>
        </div>
        </div>
    <script src="js/jquery.slim.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
</body>
</html>
<?php include("footer.php"); ?>

