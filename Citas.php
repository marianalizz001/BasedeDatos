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
    <script src='js/jquery.min.js'></script>
    <script src='js/moment.min.js'></script>

    <link rel="stylesheet" href="css/style.css">
     
    <title>Dra.YazminNajera | Empleado</title>

    <?php include("navbar.php"); ?>
    <br>
  </head>
<!--Full Calendar-->
<link rel='stylesheet' type='text/css' href='css/fullcalendar.min.css' />
    <script src='js/fullcalendar.min.js'></script>
    <script src="js/es.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<style>
    .fc th {
        padding: 10px 0px;
        vertical-align: middle;
        background: #F2F2F2;
    }

    #txtHora2 {
        border: 0;
    }

</style>

<body>
    <!-- Muestra el calendario-->
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-9">
                <div id="Calendario"></div>
            </div>
            <div class="col"></div>
        </div>
    </div>

    <script>
        /*Muestra los botones para cambiar el mes, el titulo(mes) y da la opcion de elegir el mes, la semana */
        $(document).ready(function() {
            $('#Calendario').fullCalendar({
                header: {
                    left: 'today ,prev, next',
                    center: 'title',
                    right: 'month, agendaWeek, agendaDay'
                },
                dayClick: function(date, jsEvent, view) {
                    /*Desactiva el boton de agregar, para solo poder modificar o eliminar el evento, limpia el formulario y manda llamar al modal*/
                    $('#btnAgregar').prop("disabled", false);
                    $('#btnModificar').prop("disabled", true);
                    $('#btnEliminar').prop("disabled", true);

                    $('#txtHora2').prop("hidden", true);
                    $('#txtHora2').prop("disabled", true);
                    $('#lblHora2').prop("hidden", true);

                    limpiarFormulario();
                    $('#txtFecha').val(date.format());
                    $("#ModalEventos").modal();
                },
                /*Manda llamar al documento eventos.php que es el que hace las consultas*/
                events: 'http://localhost/Citas/eventos.php',

                eventClick: function(calEvent, jsEvent, view) {
                    /*Desactiva los botones de modificar y eliminar para que solo se puedan agregar*/
                    $('#btnAgregar').prop("disabled", true);
                    $('#btnModificar').prop("disabled", false);
                    $('#btnEliminar').prop("disabled", false);


                    $('#txtHora2').prop("hidden", false);
                    $('#lblHora2').prop("hidden", false);


                    //Mostrar la innfo del evento en los inputs
                    $('#txtID').val(calEvent.id);
                    $('#txtTitulo').val(calEvent.title);
                    $('#txtNombre').val(calEvent.nombre);
                    $('#txtColor').val(calEvent.color);
                    $('#txtEstatus').val(calEvent.estatus);
                    $('#txtMonto').val(calEvent.monto);
                    $('#txtOdonto').val(calEvent.odontograma);


                    FechaHora = calEvent.start._i.split(" ");
                    $('#txtFecha').val(FechaHora[0]);
                    $('#txtHora').val(FechaHora[1]);
                    $('#txtHora2').val(FechaHora[1]);
                    $("#ModalEventos").modal();
                },
                editable: true,
                eventDrop: function(calEvent) {
                    $('#txtID').val(calEvent.id);
                    $('#txtTitulo').val(calEvent.title);
                    $('#txtNombre').val(calEvent.nombre);
                    $('#txtColor').val(calEvent.color);
                    $('#txtEstatus').val(calEvent.estatus);
                    $('#txtMonto').val(calEvent.monto);
                    $('#txtOdonto').val(calEvent.odontograma);

                    var fechaHora = calEvent.start.format().split("T");
                    $('#txtFecha').val(fechaHora[0]);
                    $('#txtHora').val(fechaHora[1]);
                    $('#txtHora2').val(fechaHora[1]);

                    RecolectarDatos();
                    EnviarInformacion('modificar', NuevoEvento, true);
                }

            });
        });

    </script>
    <!-- Modal (Eliminar, modificar y agregar) -->
    <div class="modal fade" id="ModalEventos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Citas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="txtID" name="textID">
                    <input type="hidden" id="txtFecha" name="txtFecha" />
                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label>Nombre:</label>
                            <input type="text" class="form-control" id="txtNombre" placeholder="Nombre">
                        </div>

                        <div class="form-group col-md-4">
                            <label>Hora de la cita:</label>
                            <select class="form-control" name="txtHora" id="txtHora">
                                <option>10:00-11:00</option>
                                <option>11:00-12:00</option>
                                <option>16:00-17:00</option>
                                <option>17:00-18:00</option>
                                <option>18:00-19:00</option>
                            </select>

                        </div>
                        <div class="form-row">
                            &nbsp; <label id="lblHora2" name="lblHora2">Hora seleccionada previamente:</label> &nbsp;
                            <div class="class-form col-sm-4">
                                <input type="text" class="form-control" id="txtHora2" name="txtHora2" />
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <label>Servicios:</label>
                        <select class="form-control" name="txtTitulo" id="txtTitulo">
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
                    <br>
                           <div class="input-group mb-2">
                          <label id="lblEstatus" name="lblEstatus">Estatus:</label>  &nbsp; &nbsp;
                            <select class="form-control" name="txtEstatus" id="txtEstatus">
                                <option class="form-control" value="1">Asistio</option>
                                <option class="form-control" value="0">No asistio</option>
                            </select>
                    </div>
                                 <div class="input-group mb-2">
                                   <label>Monto:</label> &nbsp; &nbsp;
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">$</span>
                                    </div>
                                    <input type="text" class="form-control"id="txtMonto" name="txtMonto"  aria-label="Amount (to the nearest dollar)">
                                    <div class="input-group-append">
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </div>
                    <div class="form-group">
                        <label>Odontograma:</label>
                        <input type="text" class="form-control" style="height: 36px, widht:30px " id="txtOdonto" name="txtOdonto" />
                    </div>
                    <div class="form-group">
                        <label>Color:</label>
                        <input type="color" class="form-control" style="height: 36px" id="txtColor" name="txtColor" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btnAgregar" class="btn btn-success">Agregar</button>
                    <button type="button" id="btnModificar" class="btn btn-success">Modificar</button>
                    <button type="button" id="btnEliminar" class="btn btn-danger">Eliminar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        /*Recolecta los datos manda llamar a la funcion Recolectar datos y envia la instruccion de lo que se desea hacer*/
        var NuevoEvento;
        $('#btnAgregar').click(function() {
            RecolectarDatos();
            EnviarInformacion('agregar', NuevoEvento);
        });
        $('#btnEliminar').click(function() {
            RecolectarDatos();
            EnviarInformacion('eliminar', NuevoEvento);
        });
        $('#btnModificar').click(function() {
            RecolectarDatos();
            EnviarInformacion('modificar', NuevoEvento);
        });

        function RecolectarDatos() {
            /*Recolecta los datos de los inputs para luego hacer las consultas*/
            NuevoEvento = {
                id: $('#txtID').val(),
                title: $('#txtTitulo').val(),
                nombre: $('#txtNombre').val(),
                start: $('#txtFecha').val() + " " + $('#txtHora').val(),
                color: $('#txtColor').val(),
                textColor: "#FFFFFF",
                end: $('#txtFecha').val() + " " + $('#txtHora').val(),
                estatus: $('#txtEstatus').val(),
                monto: $('#txtMonto').val(),
                odontograma: $('#txtOdonto').val()
            };
        }

        function EnviarInformacion(accion, objEvento, modal) {
            /*Envia la info usando ajax*/
            $.ajax({
                type: 'POST',
                url: 'eventos.php?accion=' + accion,
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
            $('#txtHora2').val('');
            $('#txtMonto').val('');
            $('#txtEstatus').val('');
            $('#txtOdonto').val('');
        }

    </script>

</body>

</html>
<?php include("footer.php"); ?>

