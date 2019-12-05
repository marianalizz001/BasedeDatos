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
    <link href="https://use.fontawesome.com/releases/v5.11.1/css/all.css" rel="stylesheet"/>

    <link rel="stylesheet" href="css/style.css">
     
    <title>Dra.YazminNajera | Paciente</title>

    <?php include("navbar.php"); include('Conexion.php');?>
    <br>
  </head>

<body>

<?php $idUsuario = $_REQUEST['idUsuario']; ?>

<div class="accordion" id="accordionExample">
        <div class="card">
            <div class="card-header" id="headingTwo">
                <h2 class="mb-0">
                <button class="btn btn-outline-secondary" type="button" style="width: 300px;"  data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                H I S T O R I A  -  C L I N I C A
                </button>
                </h2>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body">
                <?php echo'
                    <iframe class="col-lg-12 col-md-12 col-sm-12" src="Reportes/HistoriaClinica.php?idUsuario='.$idUsuario.'" height="600"></iframe>'; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="accordion" id="accordionExample">
        <div class="card">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                <button class="btn btn-outline-secondary" type="button" style="width: 300px;"  data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                 P E R F I L
                </button>
                </h2>
            </div>
            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                  <?php include("Perfil.php")?>
                </div>
            </div>
        </div>
    </div>

    <div class="accordion" id="accordionExample">
        <div class="card">
            <div class="card-header" id="headingThree">
                <h2 class="mb-0">
                <button class="btn btn-outline-secondary" type="button" style="width: 300px;"  data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                 C I T A S
                </button>
                </h2>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                <div class="card-body">
                <div class="container" id="registro">
                <div class="row">

                    <div class="col-12" id="barra_servicio">
                        <A class="h2 align-middle text-center" name="servicios" id="servicio">Citas del Paciente </A>
                    </div>
                </div>
                    <br>
                    <div class="row">
                        <div class="table-responsive col-12">
                            <table class="table table-striped">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Fecha de la cita</th>
                                        <th scope="col">Procedimiento a realizar</th>
                                        <th scope="col">¿Asistió?</th>
                                        <th scope="col">Odontograma</th>
                                        <th scope="col">Monto</th>
                                    </tr>
                                </thead>
                                <tbody class="buscar" style="padding-top: 40px; width:100%;">

                                <?php
                                    include ('Conexion.php');
                                    $idUsuario=$_GET['idUsuario'];
                                    $instruccion = "SELECT * FROM cita WHERE usuario_idUsuario=$idUsuario ";
                                    if(! $resultado = $conexion -> query($instruccion)){
                                        echo "Ha sucedido un problema ... ";
                                        exit();
                                    }
                                    while ($act = $resultado -> fetch_assoc()){
                                        $idCita = $act['id'];
                                        $nombre = $act['nombre'];
                                        $fecha = $act['start'];
                                        $proc = $act['title'];
                                        $estatus = $act['estatus'];
                                        $odontograma = $act['odontograma'];
                                        echo'
                                        <tr>
                                            <td>' .$fecha.'</td>
                                            <td>' .$proc.'</td>
                                            <td>';
                                            if($estatus==null){
                                            ?>
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <form id="miFormulario1" action="PacienteEditarPHP.php" method="post">
                                                            <?php echo '<input type="hidden" name="idCita" id="idCita" value="'.$idCita.'"> 
                                                                        <input type="hidden" name="opc" id="opc" value="1"> 
                                                                        <input type="hidden" name="idUsuario" id="idUsuario" value="'.$idUsuario.'"> 
                                                            '?>

                                                            <button id="estatus" onclick=submit title="Asistió"><i class="fas fa-check-circle" style="color:green;background-color:transparent "></i></button>
                                                        </form>
                                                    </div>
                                                    <div class="col-6">
                                                        <form id="miFormulario2" action="PacienteEditarPHP.php" method="post">
                                                            <?php echo '<input type="hidden" name="idCita" id="idCita" value="'.$idCita.'"> 
                                                                        <input type="hidden" name="opc" id="opc" value="0"> 
                                                                        <input type="hidden" name="idUsuario" id="idUsuario" value="'.$idUsuario.'">
                                                            '?>

                                                            <button id="estatus" onclick=submit title="No asistió"><i class="fas fa-times-circle" style="color:red;"></i></button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            
                                            <?php
                                            }elseif($estatus=='1'){
                                                echo "<strong style='color: green;'>Asistió</strong>";

                                            }else{
                                                echo "<strong style='color: red;'>No asistió</strong>";

                                            }
                                            echo '</td>
                                            <td>';
                                            if($odontograma==null && $estatus!='0'){                                           
                                            ?>

                                            <form id="miFormulario3" action="PacienteAlta9.php" method="post">
                                                <?php echo '<input type="hidden" name="idCita" id="idCita" value="'.$idCita.'"> 
                                                    <input type="hidden" name="idUsuario" id="idUsuario" value="'.$idUsuario.'">
                                                '?>
                                                <button onclick=submit title="Ir a odontograma" style="background:transparent;"><strong>Odontograma </strong><i class="fas fa-teeth-open"></i></button>
                                            </form>
                                            <?php
                                            }elseif($odontograma!=null && $estatus!='0'){
                                                ?>
                                                <form id="miFormulario3" action="PacienteOdontograma.php" method="post">
                                                    <?php echo '<input type="hidden" name="idCita" id="idCita" value="'.$idCita.'"> 
                                                        <input type="hidden" name="idUsuario" id="idUsuario" value="'.$idUsuario.'">
                                                    '?>
                                                    <button onclick=submit title="Ir a odontograma" style="background:rgba(85, 219, 183, 0.83);"><strong>Odontograma </strong><i class="fas fa-teeth-open"></i></button>
                                                </form>
                                            <?php
                                            }else{
                                                echo 'No hay odontograma';
                                            }
                                            echo'
                                            </td>
                                            <td>';
                                            if($estatus!='0'){
                                                $instruccion2="SELECT * from pagos where cita_idcita=$idCita";
                                                if(! $resultado2 = $conexion -> query($instruccion2)){
                                                    echo "Ha sucedido un problema ... ";
                                                    exit();
                                                }
                                                $act2 = $resultado2 -> fetch_assoc();
                                                $monto= $act2['monto'];
                                                if($monto==null){
                                                    ?>
                                                        <form id="miFormulario4" action="Pagos.php" method="post">
                                                        <?php echo '<input type="hidden" name="idCita" id="idCita" value="'.$idCita.'"> 
                                                        <input type="hidden" name="idUsuario" id="idUsuario" value="'.$idUsuario.'">
                                                    '?>
                                                        <button onclick=submit title="Agregar monto"><i class="fas fa-money-bill-wave" style="color:#136303;"></i></button>
                                                    </form>
                                                    <?php
                                                }else{
                                                    echo "$",$monto,".00";
                                                }
                                                
                                            }else{
                                                echo '$ 0.00';
                                            }
                                            
                                            echo'
                                            </td>
                                        </tr>';
                                        
                                    }
                                    $resultado -> free();  

                                ?>
                                
                                
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</body>
  
</html>
<?php include("footer.php"); ?>


