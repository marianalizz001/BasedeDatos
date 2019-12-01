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

    <?php include("navbar.php"); include('Conexion.php'); $idUsuario = $_GET['idUsuario'];?>
    <br>
  </head>

<body>

<div class="accordion" id="accordionExample">
  <div class="card">
    <div class="card-header" id="uno">
      <h2 class="mb-0">
        <button class="btn btn-outline-secondary" type="button" style="width: 300px;"  data-toggle="collapse" data-target="#collapseuno" aria-expanded="false" aria-controls="collapseuno">
          H I S T O R I A  -  C L I N I C A
        </button>
      </h2>
    </div>

    <div id="collapseuno" class="collapse" aria-labelledby="headinguno" data-parent="#accordionExample">
      <div class="card-body">
          Aqui ponemos el PDF de la historia clinica
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-header" id="headingcuatro">
      <h2 class="mb-0">
        <button class="btn btn-outline-secondary" type="button" style="width: 300px;"  data-toggle="collapse" data-target="#collapsecuatro" aria-expanded="false" aria-controls="collapsecuatro">
          P E R F I L
        </button>
      </h2>
    </div>

    <div id="collapsecuatro" class="collapse" aria-labelledby="headingcuatro" data-parent="#accordionExample">
      <div class="card-body">
        <?php include("Perfil.php")?>
      </div>
    </div>
  </div>


  <div class="card">
    <div class="card-header" id="headingdos">
      <h2 class="mb-0">
        <button class="btn btn-outline-secondary" type="button" style="width: 300px;"  data-toggle="collapse" data-target="#collapsedos" aria-expanded="false" aria-controls="collapsedos">
          C I T A S
        </button>
      </h2>
    </div>

    <div id="collapsedos" class="collapse" aria-labelledby="headingdos" data-parent="#accordionExample">
      <div class="card-body">
          
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-header" id="headingtres">
      <h2 class="mb-0">
        <button class="btn btn-outline-secondary" type="button" style="width: 300px;"  data-toggle="collapse" data-target="#collapsetres" aria-expanded="false" aria-controls="collapsetres">
          P A G O S
        </button>
      </h2>
    </div>

    <div id="collapsetres" class="collapse" aria-labelledby="headingtres" data-parent="#accordionExample">
      <div class="card-body">
          
      </div>
    </div>
  </div>
</div>
</body>
  
</html>
<?php include("footer.php"); ?>

