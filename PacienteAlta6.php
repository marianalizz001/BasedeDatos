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
        <p class="h4"> Nuevo Paciente - <small>Exploración Física</small></p>
        <hr>
        <p class="h6"> *SIGNOS VITALES <small>(En caso de ser necesarios)</small></p>

        <div class="form-row">
            <input type="hidden" value="<?php echo $idUsuario;?>" name="idUsuario">
    
            <div class="form-group col-sm-6 col-md-2">
                <label for="usuario" style="font-size:20px;color: rgba(144, 12, 52);"> Peso: </label>
                <input type="number" class="form-control" id="referido" name="referido">
            </div>

            <div class="form-group col-sm-6 col-md-2">
                <label for="usuario" style="font-size:20px;color: rgba(144, 12, 52);"> Talla: </label>
                <input type="number" class="form-control" id="ultima_consulta" name="ultima_consulta">
            </div>

            <div class="form-group col-sm-6 col-md-2">
                <label for="passwd" style="font-size:20px;color: rgba(144, 12, 52);"> F.C.: </label>
                <input type="number" class="form-control" id="mot_consulta" name="mot_consulta">
            </div>

            <div class="form-group col-sm-6 col-md-2">
                <label for="passwd" style="font-size:20px;color: rgba(144, 12, 52);"> F.R.: </label>
                <input type="number" class="form-control" id="mot_consulta" name="mot_consulta">
            </div>

            <div class="form-group col-sm-6 col-md-2">
                <label for="passwd" style="font-size:20px;color: rgba(144, 12, 52);"> T/A: </label>
                <input type="number" class="form-control" id="mot_consulta" name="mot_consulta">
            </div>

            <div class="form-group col-sm-6 col-md-2">
                <label for="passwd" style="font-size:20px;color: rgba(144, 12, 52);"> Glucosa: </label>
                <input type="number" class="form-control" id="mot_consulta" name="mot_consulta">
            </div>

        </div>

        <table class="table">
            <thead>
                <tr>
                <th scope="col" style="color: rgba(144, 12, 52);">EXAMEN ORAL</th>
                <th scope="col">CONDICIÓN GENERAL</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td> Cara</td>
                    <td>
                    <select id="condicion" class="form-control" name="condicion">
                        <option selected></option>
                        <option value="B">Bueno</option>
                        <option value="R">Regular</option>
                        <option value="M">Malo</option>
                    </select>
                    </td>
                </tr>

                <tr>
                    <td> Ganglíos </td>
                    <td>
                    <select id="condicion" class="form-control" name="condicion">
                        <option selected></option>
                        <option value="B">Bueno</option>
                        <option value="R">Regular</option>
                        <option value="M">Malo</option>
                    </select>
                    </td>
                </tr>

                <tr>
                    <td> A.T.M.</td>
                    <td>
                    <select id="condicion" class="form-control" name="condicion">
                        <option selected></option>
                        <option value="B">Bueno</option>
                        <option value="R">Regular</option>
                        <option value="M">Malo</option>
                    </select>
                    </td>
                </tr>

                <tr>
                    <td> Región Hiodeidea y Tiroidea</td>
                    <td>
                    <select id="condicion" class="form-control" name="condicion">
                        <option selected></option>
                        <option value="B">Bueno</option>
                        <option value="R">Regular</option>
                        <option value="M">Malo</option>
                    </select>
                    </td>
                </tr>

                <tr>
                    <th style="color: rgba(144, 12, 52);">EXAMEN INTRAORAL</th>
                    <td></td>
                </tr>

                <tr>
                    <td> Labios </td>
                    <td>
                    <select id="condicion" class="form-control" name="condicion">
                        <option selected></option>
                        <option value="B">Bueno</option>
                        <option value="R">Regular</option>
                        <option value="M">Malo</option>
                    </select>
                    </td>
                </tr>

                <tr>
                    <td> Carrillos</td>
                    <td>
                    <select id="condicion" class="form-control" name="condicion">
                        <option selected></option>
                        <option value="B">Bueno</option>
                        <option value="R">Regular</option>
                        <option value="M">Malo</option>
                    </select>
                    </td>
                </tr>

                <tr>
                    <td>Encías</td>
                    <td>
                    <select id="condicion" class="form-control" name="condicion">
                        <option selected></option>
                        <option value="B">Bueno</option>
                        <option value="R">Regular</option>
                        <option value="M">Malo</option>
                    </select>
                    </td>
                </tr>

                <tr>
                    <td> Frenillos</td>
                    <td>
                    <select id="condicion" class="form-control" name="condicion">
                        <option selected></option>
                        <option value="B">Bueno</option>
                        <option value="R">Regular</option>
                        <option value="M">Malo</option>
                    </select>
                    </td>
                </tr>

                <tr>
                    <td> Paladar Duro</td>
                    <td>
                    <select id="condicion" class="form-control" name="condicion">
                        <option selected></option>
                        <option value="B">Bueno</option>
                        <option value="R">Regular</option>
                        <option value="M">Malo</option>
                    </select>
                    </td>
                </tr>

                <tr>
                    <td> Paladar Blando</td>
                    <td>
                    <select id="condicion" class="form-control" name="condicion">
                        <option selected></option>
                        <option value="B">Bueno</option>
                        <option value="R">Regular</option>
                        <option value="M">Malo</option>
                    </select>
                    </td>
                </tr>

                <tr>
                    <td> Orofaringe</td>
                    <td>
                    <select id="condicion" class="form-control" name="condicion">
                        <option selected></option>
                        <option value="B">Bueno</option>
                        <option value="R">Regular</option>
                        <option value="M">Malo</option>
                    </select>
                    </td>
                </tr>

                <tr>
                    <td> Lengua </td>
                    <td>
                    <select id="condicion" class="form-control" name="condicion">
                        <option selected></option>
                        <option value="B">Bueno</option>
                        <option value="R">Regular</option>
                        <option value="M">Malo</option>
                    </select>
                    </td>
                </tr>

                <tr>
                    <td> Piso de Boca</td>
                    <td>
                    <select id="condicion" class="form-control" name="condicion">
                        <option selected></option>
                        <option value="B">Bueno</option>
                        <option value="R">Regular</option>
                        <option value="M">Malo</option>
                    </select>
                    </td>
                </tr>
            </tbody>
        </table>    
        <div class="form-row">
            <div class="form-group col-sm-6 col-md-6">
                <p class="h6" style="color: rgba(144, 12, 52);"> *TIPO DE DENTICIÓN</p>
                <select id="condicion" class="form-control" name="condicion">
                    <option selected></option>
                    <option value="B">Temporal</option>
                    <option value="R">Mixta</option>
                    <option value="M">Permanente</option>
                </select>
            </div>

            <div class="form-group col-sm-6 col-md-6">
                <p class="h6" style="color: rgba(144, 12, 52);"> *CLASIFICACIÓN DE ANGLE</p>
                <select id="condicion" class="form-control" name="condicion">
                    <option selected></option>
                    <option value="B">Clase I</option>
                    <option value="R">Clase II</option>
                    <option value="M">Clase III</option>
                </select>
            </div>
        </div>

        <div class="col-12 text-center">
            <input  class = "btn btn-success" type="submit" value="Siguiente" name = "btnEnviar">
        </div>
        <br>
    </form>
</div>
</body>
</html>
<?php include("footer.php"); ?>

