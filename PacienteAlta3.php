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
<?php $idUsuario = $_REQUEST['idUsuario']; ?>
    <br><br>
    <div class="container">
    <form action="PacienteAltaPHP4.php" method="post">
    <input type="hidden" value="<?php echo $idUsuario;?>" name="idUsuario">
        <p class="h4"> Nuevo Paciente - <small>Antecedentes Heredo Familiares</small></p>
        <hr>
        ¿Alguno de sus Padres, Abuelos o Hermanos padece alguno de los siguientes? SI/NO, ¿Quién?<br><br>
        <div class="form-row">
            <div class="form-group col-sm-6 col-md-3">
                <label for="alergias" style="font-size:20px;color: rgba(144, 12, 52);"> Alergias </label><br>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="alergias" value="S">
                    <label class="form-check-label" for="exampleRadios1"> Si </label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="alergias" value="N" checked="checked">
                    <label class="form-check-label" for="exampleRadios2"> No </label>
                </div>
            </div>
            <div class="form-group col-sm-6 col-md-4">
                <label for="quien" style="font-size:20px;color: rgba(144, 12, 52);">¿Quién?</label>
                <select id="alergias_quien" class="form-control" name="alergias_quien">
                    <option selected></option>
                    <option value="Padres">Padres</option>
                    <option value="Abuelos">Abuelos</option>
                    <option value="Hermanos">Hermanos</option>
                </select>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-sm-6 col-md-3">
                <label for="alergias" style="font-size:20px;color: rgba(144, 12, 52);"> Enfermedades Cardiológicas </label><br>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="enf_card" value="S">
                    <label class="form-check-label" for="exampleRadios1"> Si </label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="enf_car" value="N" checked="checked">
                    <label class="form-check-label" for="exampleRadios2"> No </label>
                </div>
            </div>
            <div class="form-group col-sm-6 col-md-4">
                <label for="quien" style="font-size:20px;color: rgba(144, 12, 52);">¿Quién?</label>
                <select id="enf_car_quien" class="form-control" name="enf_car_quien">
                    <option selected></option>
                    <option value="Padre">Padres</option>
                    <option value="Abuelos">Abuelos</option>
                    <option value="Hermanos">Hermanos</option>
                </select>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-sm-6 col-md-3">
                <label for="hip_arterial" style="font-size:20px;color: rgba(144, 12, 52);"> Hipertensión Arterial </label><br>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="hip_arterial" value="S">
                    <label class="form-check-label" for="exampleRadios1"> Si </label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="hip_arterial" value="N" checked="checked">
                    <label class="form-check-label" for="exampleRadios2"> No </label>
                </div>
            </div>
            <div class="form-group col-sm-6 col-md-4">
                <label for="quien" style="font-size:20px;color: rgba(144, 12, 52);">¿Quién?</label>
                <select id="hip_arterial_quien" class="form-control" name="hip_arterial_quien">
                    <option selected></option>
                    <option value="Padre">Padres</option>
                    <option value="Abuelos">Abuelos</option>
                    <option value="Hermanos">Hermanos</option>
                </select>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-sm-6 col-md-3">
                <label for="enf_onc" style="font-size:20px;color: rgba(144, 12, 52);"> Enfermedades Oncológicas </label><br>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="enf_onc" value="S">
                    <label class="form-check-label" for="exampleRadios1"> Si </label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="enf_onc" value="N" checked="checked">
                    <label class="form-check-label" for="exampleRadios2"> No </label>
                </div>
            </div>
            <div class="form-group col-sm-6 col-md-4">
                <label for="quien" style="font-size:20px;color: rgba(144, 12, 52);">¿Quién?</label>
                <select id="enf_onc_quien" class="form-control" name="enf_onc_quien">
                    <option selected></option>
                    <option value="Padre">Padres</option>
                    <option value="Abuelos">Abuelos</option>
                    <option value="Hermanos">Hermanos</option>
                </select>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-sm-6 col-md-3">
                <label for="diabetes" style="font-size:20px;color: rgba(144, 12, 52);"> Diabetes </label><br>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="diabetes" value="S">
                    <label class="form-check-label" for="exampleRadios1"> Si </label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="diabetes" value="N" checked="checked">
                    <label class="form-check-label" for="exampleRadios2"> No </label>
                </div>
            </div>
            <div class="form-group col-sm-6 col-md-4">
                <label for="quien" style="font-size:20px;color: rgba(144, 12, 52);">¿Quién?</label>
                <select id="diabetes_quien" class="form-control" name="diabetes_quien">
                    <option selected></option>
                    <option value="Padre">Padres</option>
                    <option value="Abuelos">Abuelos</option>
                    <option value="Hermanos">Hermanos</option>
                </select>
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

