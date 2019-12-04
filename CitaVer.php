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

    <title>Dra.YazminNajera | Agendar Cita</title>

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
  <br>
  <br>
  <br>

  <form>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Nombre</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="nombre" placeholder="Nombre">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Fecha</label>
    <div class="col-sm-10">
      <input type="date" class="form-control" id="fecha"  min="2019-01-01" max="2020-12-31">
    </div>
  </div>
  <div class="form-group row">      
                            <label  class="col-sm-2 col-form-label">Hora de la cita:</label>
                            <div class="col-sm-10">
                            <select class="form-control" name="hora" id="hora">
                                <option>10:00-11:00</option>
                                <option>11:00-12:00</option>
                                <option>16:00-17:00</option>
                                <option>17:00-18:00</option>
                                <option>18:00-19:00</option>
                            </select>
                            </div>
</div>
    
    <div class="form-group row">
                        <label  class="col-sm-2 col-form-label">Servicios:</label>
                        <div class="col-sm-10">
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
  </div>

 

  <div class="form-group row">
    <div class="col-sm-10">
     <button type="submit" class="btn btn-info btn-lg btn-block">Sign in</button>
    </div>
  </div>
  
</form>
  
</div>
</body>
</html>
<?php include("footer.php"); ?>