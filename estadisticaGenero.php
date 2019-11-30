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


    
    <script src="librerias/jquery-3.4.1.min.js"></script>
    <script src="librerias/plotly-latest.min.js"></script>
    <title>Dra.YazminNajera | Inventario</title>
    
    <?php include("navbar.php"); ?>
    
    

</head>

<body>
   <div class="container">
        <div class="row">
            <div class="col-sm-12"></div>
            <br><br><p class="h4"> Grafica de Genero</p>
                <div id="cargaBarras"></div>
            </div>         
        </div>
   </div>


</body>

</html>

<script type="text/javascript">
    $(document).ready(function(){
        $('#cargaBarras').load('barras.php');
    });
</script>
<?php include("footer.php"); ?>