<link href="css/sweetalert.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/functions.js"></script>
<script src="js/sweetalert.min.js"></script>

<?php
	include("Conexion.php");

 	$consulta= $conexion->prepare("Insert into mensaje (nombre, apPat, apMat, correo, telefono, mensaje) values (?,?,?,?,?,?)");
 	$consulta->bind_param('ssssis',$_REQUEST['nombre'], $_REQUEST['apPat'],$_REQUEST['apMat'],$_REQUEST['correo'],$_REQUEST['telefono'],$_REQUEST['mensaje']);
		
 	if($consulta->execute()){
		?>
		<script>
		jQuery(function() {
			swal({   
				title: "¡Bien!",   
				text: "Se ha enviado tu mensaje",   
				type: "success",    
				confirmButtonColor: "#696565",   
				confirmButtonText: "Ok",   
				closeOnConfirm: false}, 

				function(isConfirm){   
					if (isConfirm) {     
						window.location.href = "contacto.php";
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
                title: "¡Error!",   
                text: "No se envió tu mensaje",   
                type: "error",    
                confirmButtonColor: "#DD6B55",   
                confirmButtonText: "Intentar de nuevo",   
                closeOnConfirm: false},
                function(isConfirm){   
                    if (isConfirm) {     
                        window.location.href = "contacto.php";
                    }
                });
        });
        </script>
        <?php
 	}
?>