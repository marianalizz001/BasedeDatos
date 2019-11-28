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
    <form action="PacienteAltaPHP5.php" method="post" enctype="multipart/form-data">
        <?php $idUsuario = $_REQUEST['idUsuario']; ?>
        <input type="hidden" value="<?php echo $idUsuario;?>" name="idUsuario">
        <p class="h4"> Nuevo Paciente - <small>Antecedentes Personales Patológicos</small></p>
        <hr>
        <div class="form-row">
            <div class="form-group col-sm-6 col-md-7">
                <p class="h5"> ¿Ha sido hospitalizado o intervenido quirúrgicamente? </p><br>
            </div>
            <div class="form-group col-sm-6 col-md-2">
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="hospitalizado" value="S">
                    <label class="form-check-label" for="exampleRadios1"> Si </label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="hospitalizado" value="N">
                    <label class="form-check-label" for="exampleRadios2"> No </label>
                </div>
            </div>
            <div class="form-group col-sm-6 col-md-3">
                <label for="quien">Especifique</label>
                <input type="text" name="hospitalizado_esp" name="_esp">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-sm-6 col-md-7">
                <p class="h5"> ¿Se encuentra bajo algún tratamiento médico? </p><br>
            </div>
            <div class="form-group col-sm-6 col-md-2">
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="tratamiento" value="S">
                    <label class="form-check-label" for="exampleRadios1"> Si </label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="tratamiento" value="N">
                    <label class="form-check-label" for="exampleRadios2"> No </label>
                </div>
            </div>
            <div class="form-group col-sm-6 col-md-3">
                <label for="quien">Especifique</label>
                <input type="text" name="tratamiento_esp">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-sm-6 col-md-7">
                <p class="h5"> ¿Alergia a alguna sustancia, anestesia o medicamento? </p><br>
            </div>
            <div class="form-group col-sm-6 col-md-2">
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="anestesia" value="S">
                    <label class="form-check-label" for="exampleRadios1"> Si </label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="anestesia" value="N">
                    <label class="form-check-label" for="exampleRadios2"> No </label>
                </div>
            </div>
            <div class="form-group col-sm-6 col-md-3">
                <label for="quien">Especifique</label>
                <input type="text" name="anestesia_esp">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-sm-6 col-md-7">
                <p class="h5"> ¿Padece enfermedades de la sangre? </p><br>
            </div>
            <div class="form-group col-sm-6 col-md-2">
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="sangre" value="S">
                    <label class="form-check-label" for="exampleRadios1"> Si </label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="sangre" value="N">
                    <label class="form-check-label" for="exampleRadios2"> No </label>
                </div>
            </div>
            <div class="form-group col-sm-6 col-md-3">
                <label for="quien">Especifique</label>
                <input type="text" name="sangre_esp">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-sm-6 col-md-7">
                <p class="h5"> ¿Algún golpe que le haya dejado una secuela? </p><br>
            </div>
            <div class="form-group col-sm-6 col-md-2">
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="secuela" value="S">
                    <label class="form-check-label" for="exampleRadios1"> Si </label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="secuela" value="N">
                    <label class="form-check-label" for="exampleRadios2"> No </label>
                </div>
            </div>
            <div class="form-group col-sm-6 col-md-3">
                <label for="quien">Especifique</label>
                <input type="text" name="secuela_esp">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-sm-6 col-md-7">
                <p class="h5"> ¿Padece hipo/hipertensión arterial?</p><br>
            </div>
            <div class="form-group col-sm-6 col-md-2">
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="hipertension" value="S">
                    <label class="form-check-label" for="exampleRadios1"> Si </label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="hipertension" value="N">
                    <label class="form-check-label" for="exampleRadios2"> No </label>
                </div>
            </div>
            <div class="form-group col-sm-6 col-md-3">
                <label for="quien">Especifique</label>
                <input type="text" name="hipertension_esp">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-sm-6 col-md-7">
                <p class="h5"> ¿Padece alguna enfermedad del corazón? </p><br>
            </div>
            <div class="form-group col-sm-6 col-md-2">
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="corazon" value="S">
                    <label class="form-check-label" for="exampleRadios1"> Si </label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="corazon" value="N">
                    <label class="form-check-label" for="exampleRadios2"> No </label>
                </div>
            </div>
            <div class="form-group col-sm-6 col-md-3">
                <label for="quien">Especifique</label>
                <input type="text" name="corazon_esp">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-sm-6 col-md-7">
                <p class="h5"> ¿Padece alguna enfermedad respiratoria? </p><br>
            </div>
            <div class="form-group col-sm-6 col-md-2">
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="respiratoria" value="S">
                    <label class="form-check-label" for="exampleRadios1"> Si </label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="respiratoria" value="N">
                    <label class="form-check-label" for="exampleRadios2"> No </label>
                </div>
            </div>
            <div class="form-group col-sm-6 col-md-3">
                <label for="quien">Especifique</label>
                <input type="text" name="respiratoria_esp">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-sm-6 col-md-7">
                <p class="h5"> ¿Padece convulsiones?</p><br>
            </div>
            <div class="form-group col-sm-6 col-md-2">
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="convulsiones" value="S">
                    <label class="form-check-label" for="exampleRadios1"> Si </label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="convulsiones" value="N">
                    <label class="form-check-label" for="exampleRadios2"> No </label>
                </div>
            </div>
            <div class="form-group col-sm-6 col-md-3">
                <label for="quien">Especifique</label>
                <input type="text" name="convulsiones_esp">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-sm-6 col-md-7">
                <p class="h5"> ¿Padece hepatitis?</p><br>
            </div>
            <div class="form-group col-sm-6 col-md-2">
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="hepatitis" value="S">
                    <label class="form-check-label" for="exampleRadios1"> Si </label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="hepatitis" value="N">
                    <label class="form-check-label" for="exampleRadios2"> No </label>
                </div>
            </div>
            <div class="form-group col-sm-6 col-md-3">
                <label for="quien">Especifique</label>
                <input type="text" name="hepatitis_esp">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-sm-6 col-md-7">
                <p class="h5"> Padece de VIH/SIDA?</p><br>
            </div>
            <div class="form-group col-sm-6 col-md-2">
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="vih" value="S">
                    <label class="form-check-label" for="exampleRadios1"> Si </label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="vih" value="N">
                    <label class="form-check-label" for="exampleRadios2"> No </label>
                </div>
            </div>
            <div class="form-group col-sm-6 col-md-3">
                <label for="quien">Especifique</label>
                <input type="text" name="vih_esp">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-sm-6 col-md-7">
                <p class="h5"> ¿Padece tuberculosis? </p><br>
            </div>
            <div class="form-group col-sm-6 col-md-2">
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="tuberculosis" value="S">
                    <label class="form-check-label" for="exampleRadios1"> Si </label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="tuberculosis" value="N">
                    <label class="form-check-label" for="exampleRadios2"> No </label>
                </div>
            </div>
            <div class="form-group col-sm-6 col-md-3">
                <label for="quien">Especifique</label>
                <input type="text" name="tuberculosis_esp">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-sm-6 col-md-7">
                <p class="h5"> ¿Padece alguna enfermedad en los riñores?  </p><br>
            </div>
            <div class="form-group col-sm-6 col-md-2">
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="rinones" value="S">
                    <label class="form-check-label" for="exampleRadios1"> Si </label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="rinones" value="N">
                    <label class="form-check-label" for="exampleRadios2"> No </label>
                </div>
            </div>
            <div class="form-group col-sm-6 col-md-3">
                <label for="quien">Especifique</label>
                <input type="text" name="rinones_esp">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-sm-6 col-md-7">
                <p class="h5"> ¿Padece otra enfermedad no mencionada? </p><br>
            </div>
            <div class="form-group col-sm-6 col-md-2">
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="nomencionada" value="S">
                    <label class="form-check-label" for="exampleRadios1"> Si </label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="nomencionada" value="N">
                    <label class="form-check-label" for="exampleRadios2"> No </label>
                </div>
            </div>
            <div class="form-group col-sm-6 col-md-3">
                <label for="quien">Especifique</label>
                <input type="text" name="nomencionada_esp">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-sm-6 col-md-7">
                <p class="h5"> ¿Ha necesitado alguna transfusión sanguínea?</p><br>
            </div>
            <div class="form-group col-sm-6 col-md-2">
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="transfusion" value="S">
                    <label class="form-check-label" for="exampleRadios1"> Si </label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="transfusion" value="N">
                    <label class="form-check-label" for="exampleRadios2"> No </label>
                </div>
            </div>
            <div class="form-group col-sm-6 col-md-3">
                <label for="quien">Especifique</label>
                <input type="text" name="transfusion_esp">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-sm-6 col-md-7">
                <p class="h5"> ¿Está tomando algún medicamento?</p><br>
            </div>
            <div class="form-group col-sm-6 col-md-2">
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="medicamento" value="S">
                    <label class="form-check-label" for="exampleRadios1"> Si </label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="medicamento" value="N">
                    <label class="form-check-label" for="exampleRadios2"> No </label>
                </div>
            </div>
            <div class="form-group col-sm-6 col-md-3">
                <label for="quien">Especifique</label>
                <input type="text" name="medicamento_esp">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-6 col-md-12">
                <p class="h5">*Observaciones:</p><br>
            </div>
            <div class="col-sm-12 col-md-12">
                <textarea class="form-control" name="observaciones"  rows="2" style="resize: none;" ></textarea>
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

