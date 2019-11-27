<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<link rel="icon" href="img/favicon.png">

<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/style_admin.css">
<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">

<title>ADMIN</title>

<script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		
<script type="text/javascript">
	$(document).ready(function() {
        $("#agUsuario").click(function(event) {
            $("#contenido").load('agregar_usuario.php');
			});
        });
    $(document).ready(function() {
        $("#agArea").click(function(event) {
            $("#contenido").load('agregar_area.php');
			});
		});
</script>


<script>
$(function () {
    $('.navbar-toggle').click(function () {
        $('.navbar-nav').toggleClass('slide-in');
        $('.side-body').toggleClass('body-slide-in');
        $('#search').removeClass('in').addClass('collapse').slideUp(200);
        
    });
   
   $('#search-trigger').click(function () {
        $('.navbar-nav').removeClass('slide-in');
        $('.side-body').removeClass('body-slide-in');
    });

});


</script>

<div class="row">
    <div class="side-menu">
    <nav class="navbar navbar-default" role="navigation">
    <div class="navbar-header">
        <div class="brand-wrapper">
            <button type="button" class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

        </div>
    </div>

    <div class="side-menu-container">
        <ul class="nav navbar-nav" style="width:290px;">

            <!-- <li><a href="#"><span class="glyphicon glyphicon-send"></span> Link</a></li>
            <li class="active"><a href="#"><span class="glyphicon glyphicon-plane"></span> Active Link</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-cloud"></span> Link</a></li> -->

            <!-- Dropdown-->
            <li class="panel panel-default" id="dropdown">
                <a data-toggle="collapse" href="#dropdown-lvl1">
                    <span class="glyphicon glyphicon-user"></span> Usuario <span class="caret"></span>
                </a>

                <!-- Dropdown level 1 -->
                <div id="dropdown-lvl1" class="panel-collapse collapse">
                    <div class="panel-body">
                        <ul class="nav navbar-nav">
                            <li><a href="#" id="agUsuario">Agregar</a></li>
                            <li><a href="#">Editar</a></li>
                            <li><a href="#">Eliminar</a></li>
                        </ul>
                    </div>
                </div>
            
            </li>

            <li class="panel panel-default" id="dropdown">
                <a data-toggle="collapse" href="#dropdown-lvl2">
                    <span class="glyphicon glyphicon-list-alt"></span> Área <span class="caret"></span>
                </a>

                <!-- Dropdown level 1 -->
                <div id="dropdown-lvl2" class="panel-collapse collapse">
                    <div class="panel-body">
                        <ul class="nav navbar-nav">
                            <li><a href="#" id="agArea">Agregar</a></li>
                            <li><a href="#">Editar</a></li>
                            <li><a href="#">Eliminar</a></li>
                        </ul>
                    </div>
                </div>
            
            </li>

            <li><a href="#"><span class="glyphicon glyphicon-signal"></span> Estadisticas </a></li>

        </ul>
    </div>
</nav>
    
    </div>



    <div class="container-fluid">
        <div class="side-body">
            <img src="img/logo.jpg" class="img-fluid" alt="100px">
            <pre> <strong>I T Q A</strong> - A D M I N I S T R A D O R </pre>
        </div>

        <div class="side-body" id="contenido">

        </div>
    </div>
    </div>
    
</div>

<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/scripts.js"></script>