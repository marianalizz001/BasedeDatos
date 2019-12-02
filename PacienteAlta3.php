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

    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script type="text/javascript">
    
    function habilitar(radio){
        if (radio == 1)
            document.getElementById("alergias").style.visibility = "visible";
        if (radio == 2)
            document.getElementById("alergias").style.visibility = "hidden";
        if (radio == 3)
            document.getElementById("cardiologicas").style.visibility = "visible";
        if (radio == 4)
            document.getElementById("cardiologicas").style.visibility = "hidden";
        if (radio == 5)
            document.getElementById("hipertension").style.visibility = "visible";
        if (radio == 6)
            document.getElementById("hipertension").style.visibility = "hidden";
        if (radio == 7)
            document.getElementById("oncologicas").style.visibility = "visible";
        if (radio == 8)
            document.getElementById("oncologicas").style.visibility = "hidden";
        if (radio == 9)
            document.getElementById("diabetes").style.visibility = "visible";
        if (radio == 10)
            document.getElementById("diabetes").style.visibility = "hidden";

    }

    </script>

  </head>

<body>
    <br><br>
    <div class="container">
    <form action="PacienteAltaPHP3.php" method="post">
    <?php $idUsuario = $_REQUEST['idUsuario']; ?>
    <input type="hidden" value="<?php echo $idUsuario;?>" name="idUsuario">
        <p class="h4"> Nuevo Paciente - <small>Antecedentes Heredo Familiares</small></p>
        <hr>
        ¿Alguno de sus Padres, Abuelos o Hermanos padece alguno de los siguientes? SI/NO, ¿Quién?<br><br>
        <div class="form-row">
            <div class="form-group col-sm-6 col-md-3">
                <label for="alergias" style="font-size:20px;color: rgba(144, 12, 52);"> Alergias </label><br>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="alergias" value="Si" onclick="habilitar(1)">
                    <label class="form-check-label" for="exampleRadios1"> Si </label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="alergias" value="No" onclick="habilitar(2)">
                    <label class="form-check-label" for="exampleRadios2"> No </label>
                </div>
            </div>

            <div class="form-group col-sm-6 col-md-4" style="visibility: hidden;" id="alergias">
                <label for="quien" style="font-size:20px;color: rgba(144, 12, 52);">¿Quién?</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="Si" name="a_padre">
                    <label class="form-check-label" for="inlineCheckbox1">Padres</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="Si" name="a_abuelo">
                    <label class="form-check-label" for="inlineCheckbox2">Abuelos</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="Si" name="a_hermanos">
                    <label class="form-check-label" for="inlineCheckbox3">Hermanos</label>
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-sm-6 col-md-3">
                <label for="alergias" style="font-size:20px;color: rgba(144, 12, 52);"> Enfermedades Cardiológicas </label><br>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="cardiologicas" value="Si" onclick="habilitar(3)">
                    <label class="form-check-label" for="exampleRadios1"> Si </label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="cardiologicas" value="No" onclick="habilitar(4)">
                    <label class="form-check-label" for="exampleRadios2"> No </label>
                </div>
            </div>

            <div class="form-group col-sm-6 col-md-4" style="visibility: hidden;" id="cardiologicas">
                <label for="quien" style="font-size:20px;color: rgba(144, 12, 52);">¿Quién?</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="Si" name="card_padre">
                    <label class="form-check-label" for="inlineCheckbox1">Padres</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="Si" name="card_abuelo">
                    <label class="form-check-label" for="inlineCheckbox2">Abuelos</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="Si" name="card_hermanos">
                    <label class="form-check-label" for="inlineCheckbox3">Hermanos</label>
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-sm-6 col-md-3">
                <label for="alergias" style="font-size:20px;color: rgba(144, 12, 52);"> Hipertensión Arterial </label><br>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="hipertension" value="Si" onclick="habilitar(5)">
                    <label class="form-check-label" for="exampleRadios1"> Si </label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="hipertension" value="No" onclick="habilitar(6)">
                    <label class="form-check-label" for="exampleRadios2"> No </label>
                </div>
            </div>

            <div class="form-group col-sm-6 col-md-4" style="visibility: hidden;" id="hipertension">
                <label for="quien" style="font-size:20px;color: rgba(144, 12, 52);">¿Quién?</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="Si" name="hip_padre">
                    <label class="form-check-label" for="inlineCheckbox1">Padres</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="Si" name="hip_abuelo">
                    <label class="form-check-label" for="inlineCheckbox2">Abuelos</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="Si" name="hip_hermanos">
                    <label class="form-check-label" for="inlineCheckbox3">Hermanos</label>
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-sm-6 col-md-3">
                <label for="alergias" style="font-size:20px;color: rgba(144, 12, 52);"> Enfermedades Oncológicas </label><br>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="oncologicas" value="Si" onclick="habilitar(7)">
                    <label class="form-check-label" for="exampleRadios1"> Si </label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="oncologicas" value="No" onclick="habilitar(8)">
                    <label class="form-check-label" for="exampleRadios2"> No </label>
                </div>
            </div>

            <div class="form-group col-sm-6 col-md-4" style="visibility: hidden;" id="oncologicas">
                <label for="quien" style="font-size:20px;color: rgba(144, 12, 52);">¿Quién?</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="Si" name="onc_padre">
                    <label class="form-check-label" for="inlineCheckbox1">Padres</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="Si" name="onc_abuelo">
                    <label class="form-check-label" for="inlineCheckbox2">Abuelos</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="Si" name="onc_hermanos">
                    <label class="form-check-label" for="inlineCheckbox3">Hermanos</label>
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-sm-6 col-md-3">
                <label for="alergias" style="font-size:20px;color: rgba(144, 12, 52);"> Diabetes </label><br>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="diabetes" value="Si" onclick="habilitar(9)">
                    <label class="form-check-label" for="exampleRadios1"> Si </label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="diabetes" value="No" onclick="habilitar(10)">
                    <label class="form-check-label" for="exampleRadios2"> No </label>
                </div>
            </div>

            <div class="form-group col-sm-6 col-md-4" style="visibility: hidden;" id="diabetes">
                <label for="quien" style="font-size:20px;color: rgba(144, 12, 52);">¿Quién?</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="Si" name="diab_padre">
                    <label class="form-check-label" for="inlineCheckbox1">Padres</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="Si" name="diab_abuelo">
                    <label class="form-check-label" for="inlineCheckbox2">Abuelos</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="Si" name="diab_hermanos">
                    <label class="form-check-label" for="inlineCheckbox3">Hermanos</label>
                </div>
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

