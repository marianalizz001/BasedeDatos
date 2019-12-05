<link href="css/sweetalert.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/functions.js"></script>
<script src="js/sweetalert.min.js"></script>

<?php
    $idUsuario = $_GET['idUsuario'];
    include('Conexion.php');

    $fecha = date("Y-m-d");

    $consulta= $conexion->prepare("UPDATE Usuario SET f_baja=? WHERE idUsuario=?");
    $consulta->bind_param('ss', $fecha, $idUsuario);

 	if(!$consulta->execute()){
        ?>
        <script>
        jQuery(function() {
            swal({   
                title: "¡Error!",   
                text: "El usuario no fue eliminado",   
                type: "error",    
                confirmButtonColor: "#DD6B55",   
                confirmButtonText: "Intentar de nuevo",   
                closeOnConfirm: false}, 

                function(isConfirm){   
                    if (isConfirm) {     
                        window.location.href = "javascript:window.history.back()";
                    }
                });
        });
        </script>
        <?php
    }else{
        ?>
        <script>
        jQuery(function() {
            swal({   
				title: "¡Bien!",   
				text: "Se ha eliminado el usuario",   
				type: "success",    
				confirmButtonColor: "#696565",   
				confirmButtonText: "Ok",   
				closeOnConfirm: false}, 

				function(isConfirm){   
					if (isConfirm) {     
						window.location.href = "javascript:window.history.back()";
					}
				});
        });
        </script>
        <?php
    }

?>