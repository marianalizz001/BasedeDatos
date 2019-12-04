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
                 
                </div>
            </div>
        </div>
    </div>
</body>
  
</html>
<?php include("footer.php"); ?>


