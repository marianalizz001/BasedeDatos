
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
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet" />

    <link rel="stylesheet" href="css/style.css">

    <title>Dra.YazminNajera | Inventario</title>

    <?php include("navbar.php"); ?>
    <br>

</head>

<body>
    <div class="container" id="registro">
        <div class="row">
            <div class="col-12" id="barra_servicio">
                <A class="h2 align-middle text-center" name="servicios" id="servicio">Agendar Cita</A>
            </div>
        </div>
        <br><br>
        <?php
          $instruccion = ("SELECT idUsuario FROM Usuario WHERE usuario=?");
          $consulta = $conexion->prepare($instruccion);
          $consulta->bind_param("s", $usuario);
      
          if($consulta->execute()){
              $consulta->bind_result($idUsuario);
              $consulta->fetch();
             // echo $idUsuario;
          }else{
              echo $conexion -> error;
          }           
?>
        <div class="container">
            <br><br>
            <div class="row">
                <div class="col-6">
                    <form action="eventosPac.php"  method="POST  enctype="multipart/form-data">
                        <div class="form-group row">
                            <div class="col-6">
                            <input type="hidden" value="<?php echo $_SESSION['id'];?>" name="idUsuario" id="idUsuario" >
                                <label for="nombre-paciente" style="font-size:20px;color: rgba(144, 12, 52);"> Nombre del Usuario: </label>
                            </div>
                            <div class="col-6">
                                <input type="text" class="form-control" readonly="readonly"  name="nom_paciente" id="nom_paciente"  value="<?php echo $_SESSION['nombre']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-6">
                                <label for="fecha" style="font-size:20px;color: rgba(144, 12, 52);"> Fecha de la cita: </label>
                            </div>
                            <div class="col-6">
                                <input type="date" class="form-control" name="fecha_cita" id="fecha_cita" min="2019-12-01" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-6">
                                <label for="hora" style="font-size:20px;color: rgba(144, 12, 52);"> Hora de la cita: </label>
                            </div>
                            <div class="col-6">
                            <select class="form-control" name="txtHora" id="txtHora">
                                <option>10:00:00</option>
                                <option>11:00:00</option>
                                <option>16:00:00</option>
                                <option>17:00:00</option>
                                <option>18:00:00</option>
                                <option>19:00:00</option>
                            </select>

                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-6">
                                <label for="titulo" style="font-size:20px;color: rgba(144, 12, 52);"> Servicios: </label>
                            </div>
                            <div class="col-6">
                            <select class="form-control" name="txtTitulo" id="txtHora">
                            <option>Ortodoncia</option>
                            <option>Protesis</option>
                            <option>Estetica dental</option>
                            <option>Higiene</option>
                            <option>Prevencion</option>
                            <option>Odontopediatria</option>
                            <option>Endodoncia</option>
                            <option>Peridoncia</option>
                            <option>Cirugia dental</option>
                            <option>Otros</option>
                        </select>

                            </div>
                        </div>
                        <br><br>
                        <input class="btn btn-success btn-lg btn-block" type="submit" value="Agendar Cita" name="btnEnviar">
                     
                    </form>
                    
                </div>
                <div class="col-6">
                        <img src="img/calendario.jpg" alt="Calendario" width="250px">
                    </div>
            </div>

            <script>
        /*Recolecta los datos manda llamar a la funcion Recolectar datos y envia la instruccion de lo que se desea hacer*/
        var NuevoEvento;
        $('#btnEnviar').click(function() {
            RecolectarDatos();
            EnviarInformacion('agregar', NuevoEvento);
        });


        function RecolectarDatos() {
            /*Recolecta los datos de los inputs para luego hacer las consultas*/
            if ( $('#txtTitulo').val() == "Ortodoncia"){
               $color="#0080ff";
            }
            if ( $('#txtTitulo').val() == "Protesis"){
               $color="#ff8000";
            }
            if ( $('#txtTitulo').val() == "Estetica dental"){
               $color="#ce00ce";
            }
            if ( $('#txtTitulo').val() == "Higiene"){
               $color="#00df52";
            }
            if ( $('#txtTitulo').val() == "Prevencion"){
               $color="#004080";
            }
            if ( $('#txtTitulo').val() == "Odontopediatria"){
               $color="#d5006b";
            }
            if ( $('#txtTitulo').val() == "Endodoncia"){
               $color="#ff0606";
            }
            if ( $('#txtTitulo').val() == "Peridoncia"){
               $color="#1B743A";
            }
            if ( $('#txtTitulo').val() == "Cirugia dental"){
               $color="#a80b0b";
            }
            if ( $('#txtTitulo').val() == "Otros"){
               $color="#000000";
            }
             
            
                     
            NuevoEvento = {
  
                id: $('#idUsuario').val(),
                title: $('#txtTitulo').val(),
                nombre: $('#txtNombre').val(),
                start: $('#txtFecha').val() + " " + $('#txtHora').val(),
                color: $color,
                textColor: "#FFFFFF",
                end: $('#txtFecha').val() + " " + $('#txtHora').val()
            };
            
        }

        function EnviarInformacion(accion, objEvento) {
            /*Envia la info usando ajax*/
            $.ajax({
                type: 'POST',
                url: 'eventosPac.php?accion=' + accion,
                data: objEvento,
                success: function(msj) {
                    if (msj) {
                        $('#Calendario').fullCalendar('refetchEvents');
                        if (!modal) {
                            $("#ModalEventos").modal('toggle');
                        }
                    }
                },
                error: function() {
                    alert: ('Hay un error...');
                }

            });
        }

        function limpiarFormulario() {
            /*Limpia el formulario */
            $('#txtID').val('');
            $('#txtTitulo').val('');
            $('#txtNombre').val('');
            $('#txtColor').val('');
            $('#txtHora').val('');
        }

    </script>

            <br><br><br>
            <br>
            <br>
            <br>
        </div>

    </div>

</body>

</html>
<?php include("footer.php"); ?>