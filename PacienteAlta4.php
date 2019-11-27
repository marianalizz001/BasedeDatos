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
    <form action="PacienteAltaPHP.php" method="post" enctype="multipart/form-data">
        <p class="h4"> Nuevo Paciente - <small>Antecedentes Personales NO Patológicos</small></p>
        <hr>
        <div class="form-row">
            <div class="form-group col-sm-6 col-md-7">
                <p class="h5"> ¿Cuanta su hogar con todos los servicios básicos de urbanidad? </p><br>
            </div>
            <div class="form-group col-sm-6 col-md-2">
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="alergias" value="S">
                    <label class="form-check-label" for="exampleRadios1"> Si </label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="alergias" value="N" checked="checked">
                    <label class="form-check-label" for="exampleRadios2"> No </label>
                </div>
            </div>
            <div class="form-group col-sm-6 col-md-3">
                <label for="quien">Especifique</label>
                <input type="text">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-sm-6 col-md-7">
                <p class="h5"> ¿Su baño personal es diario? </p><br>
            </div>
            <div class="form-group col-sm-6 col-md-2">
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="alergias" value="S">
                    <label class="form-check-label" for="exampleRadios1"> Si </label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="alergias" value="N" checked="checked">
                    <label class="form-check-label" for="exampleRadios2"> No </label>
                </div>
            </div>
            <div class="form-group col-sm-6 col-md-3">
                <label for="quien">Especifique</label>
                <input type="text">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-sm-6 col-md-7">
                <p class="h5"> ¿Cepilla sus dientes <small>(Veces por día)</small>? </p><br>
            </div>
            <div class="form-group col-sm-6 col-md-2">
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="alergias" value="S">
                    <label class="form-check-label" for="exampleRadios1"> Si </label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="alergias" value="N" checked="checked">
                    <label class="form-check-label" for="exampleRadios2"> No </label>
                </div>
            </div>
            <div class="form-group col-sm-6 col-md-3">
                <label for="quien">Especifique</label>
                <input type="text">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-sm-6 col-md-7">
                <p class="h5"> ¿Utiliza enjuague bucal? </p><br>
            </div>
            <div class="form-group col-sm-6 col-md-2">
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="alergias" value="S">
                    <label class="form-check-label" for="exampleRadios1"> Si </label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="alergias" value="N" checked="checked">
                    <label class="form-check-label" for="exampleRadios2"> No </label>
                </div>
            </div>
            <div class="form-group col-sm-6 col-md-3">
                <label for="quien">Especifique</label>
                <input type="text">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-sm-6 col-md-7">
                <p class="h5"> ¿Utiliza hilo dental? </p><br>
            </div>
            <div class="form-group col-sm-6 col-md-2">
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="alergias" value="S">
                    <label class="form-check-label" for="exampleRadios1"> Si </label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="alergias" value="N" checked="checked">
                    <label class="form-check-label" for="exampleRadios2"> No </label>
                </div>
            </div>
            <div class="form-group col-sm-6 col-md-3">
                <label for="quien">Especifique</label>
                <input type="text">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-sm-6 col-md-7">
                <p class="h5"> ¿Realiza actividad física? <small>(Horas por semana)</small></p><br>
            </div>
            <div class="form-group col-sm-6 col-md-2">
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="alergias" value="S">
                    <label class="form-check-label" for="exampleRadios1"> Si </label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="alergias" value="N" checked="checked">
                    <label class="form-check-label" for="exampleRadios2"> No </label>
                </div>
            </div>
            <div class="form-group col-sm-6 col-md-3">
                <label for="quien">Especifique</label>
                <input type="text">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-sm-6 col-md-7">
                <p class="h5"> ¿Ha consumido o consume drogas? <small>(Cuál)</small> </p><br>
            </div>
            <div class="form-group col-sm-6 col-md-2">
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="alergias" value="S">
                    <label class="form-check-label" for="exampleRadios1"> Si </label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="alergias" value="N" checked="checked">
                    <label class="form-check-label" for="exampleRadios2"> No </label>
                </div>
            </div>
            <div class="form-group col-sm-6 col-md-3">
                <label for="quien">Especifique</label>
                <input type="text">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-sm-6 col-md-7">
                <p class="h5"> ¿Fuma? <small>(Cigarrillos por día)</small> </p><br>
            </div>
            <div class="form-group col-sm-6 col-md-2">
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="alergias" value="S">
                    <label class="form-check-label" for="exampleRadios1"> Si </label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="alergias" value="N" checked="checked">
                    <label class="form-check-label" for="exampleRadios2"> No </label>
                </div>
            </div>
            <div class="form-group col-sm-6 col-md-3">
                <label for="quien">Especifique</label>
                <input type="text">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-sm-6 col-md-7">
                <p class="h5"> ¿Consume bebidas alcohólicas? <small>(Frecuencia y Cantidad)</small> </p><br>
            </div>
            <div class="form-group col-sm-6 col-md-2">
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="alergias" value="S">
                    <label class="form-check-label" for="exampleRadios1"> Si </label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="alergias" value="N" checked="checked">
                    <label class="form-check-label" for="exampleRadios2"> No </label>
                </div>
            </div>
            <div class="form-group col-sm-6 col-md-3">
                <label for="quien">Especifique</label>
                <input type="text">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-sm-6 col-md-7">
                <p class="h5"> ¿Tatuajes?</p><br>
            </div>
            <div class="form-group col-sm-6 col-md-2">
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="alergias" value="S">
                    <label class="form-check-label" for="exampleRadios1"> Si </label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="alergias" value="N" checked="checked">
                    <label class="form-check-label" for="exampleRadios2"> No </label>
                </div>
            </div>
            <div class="form-group col-sm-6 col-md-3">
                <label for="quien">Especifique</label>
                <input type="text">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-sm-6 col-md-7">
                <p class="h5"> ¿Esquema de inmunización completo? </p><br>
            </div>
            <div class="form-group col-sm-6 col-md-2">
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="alergias" value="S">
                    <label class="form-check-label" for="exampleRadios1"> Si </label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="alergias" value="N" checked="checked">
                    <label class="form-check-label" for="exampleRadios2"> No </label>
                </div>
            </div>
            <div class="form-group col-sm-6 col-md-3">
                <label for="quien">Especifique</label>
                <input type="text">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-sm-6 col-md-7">
                <p class="h5"> ¿Está embarazada? <small>(Semanas)</small> </p><br>
            </div>
            <div class="form-group col-sm-6 col-md-2">
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="alergias" value="S">
                    <label class="form-check-label" for="exampleRadios1"> Si </label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="alergias" value="N" checked="checked">
                    <label class="form-check-label" for="exampleRadios2"> No </label>
                </div>
            </div>
            <div class="form-group col-sm-6 col-md-3">
                <label for="quien">Especifique</label>
                <input type="text">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-sm-6 col-md-7">
                <p class="h5"> ¿Está amamantando? </p><br>
            </div>
            <div class="form-group col-sm-6 col-md-2">
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="alergias" value="S">
                    <label class="form-check-label" for="exampleRadios1"> Si </label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="alergias" value="N" checked="checked">
                    <label class="form-check-label" for="exampleRadios2"> No </label>
                </div>
            </div>
            <div class="form-group col-sm-6 col-md-3">
                <label for="quien">Especifique</label>
                <input type="text">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-sm-6 col-md-7">
                <p class="h5"> ¿Uso de anticonceptivos?</p><br>
            </div>
            <div class="form-group col-sm-6 col-md-2">
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="alergias" value="S">
                    <label class="form-check-label" for="exampleRadios1"> Si </label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="alergias" value="N" checked="checked">
                    <label class="form-check-label" for="exampleRadios2"> No </label>
                </div>
            </div>
            <div class="form-group col-sm-6 col-md-3">
                <label for="quien">Especifique</label>
                <input type="text">
            </div>
        </div>

        

        
        <br>
        <div class="col-12 text-center">
            <input  class = "btn btn-success" type="submit" value="Siguiente" name = "btnEnviar">
        </div>
        <br>
    </form>
</div>
</body>
</html>
<?php include("footer.php"); ?>

