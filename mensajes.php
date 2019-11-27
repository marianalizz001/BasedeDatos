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

    <title>Dra.YazminNajera | Mensajes</title>

    <?php include("navbar.php"); ?>
    <br>

    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>

<script type="text/javascript">

$(document).ready(function () {

(function ($) {

    $('#filtrar').keyup(function () {

        var rex = new RegExp($(this).val(), 'i');
        $('.buscar tr').hide();
        $('.buscar tr').filter(function () {
            return rex.test($(this).text());
        }).show();

    })

}(jQuery));
});

</script>

</head>
<body>
<div class="col-sm-12 col-md-4" style="float: right !important;">
      <div class="input-group" style="margin-top:20px; padding-bottom:10px;">
        <span class="input-group-addon">Buscar&nbsp;&nbsp;</span>
        <input id="filtrar" type="text" class="form-control" placeholder="">
      </div>
    </div>
</div>


<div class="table-responsive">
    <table class="table table-hover">
        <thead class="thead-light">
            <tr>
                <th scope="col"><span><i class="fas fa-eye fa-lg"></i></span></th>
                <th scope="col">No.</th>
                <th scope="col">Autor</th>
                <th scope="col">Datos de Contacto</th>
                <th scope="col">Mensaje</th>
                <th scope="col">Fecha</th>
            </tr>
        </thead>
        <tbody class="buscar" style="padding-top: 40px; width:100%;">

        <?php
            include ('Conexion.php');
                            
            $instruccion = "SELECT * FROM mensaje ORDER BY f_enviado DESC";

            if(! $resultado = $conexion -> query($instruccion)){
                echo "Ha sucedido un problema ... ";
                exit();
            }
            while ($act = $resultado -> fetch_assoc()){
                $id_mensaje = $act['id_mensaje'];
                $nombre = $act['nombre'];
                $apPat = $act['apPat'];
                $apMat = $act['apMat'];
                $correo = $act['correo'];
                $telefono = $act['telefono'];
                $mensaje = $act['mensaje'];
                $f_enviado = $act['f_enviado'];

                if ($act['visto'] == '0'){
                    echo'
                    <tr>    
                        <td><a href="MensajeOk.php?id_mensaje='.$act['id_mensaje'].';?>"><img src="img/cerrar.png" width="25" height="25"></a></td>
                        <td>' .$id_mensaje.'</td>
                        <td>' .$nombre. " " .$apPat. " " .$apMat.'</td>
                        <td>' .$correo. " " .$telefono. '</td>
                        <td>' .$mensaje.'</td>
                        <td>' .$f_enviado.'</td>
                    </tr>';
                }
            }
            $resultado -> free();  

        ?>            
        </tbody>
    </table>
</div>
    
</body>
</html>
<?php include("footer.php"); ?>
<script src="js/jquery.slim.js"></script>
    <script src="js/scripts.js"></script>
