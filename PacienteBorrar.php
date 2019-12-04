<link href="css/sweetalert.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/functions.js"></script>
<script src="js/sweetalert.min.js"></script>

<!--
<script>
    jQuery(function() {
        swal({   
        title: "¿Está seguro?",   
        text: "El paciente será eliminado",   
        type: "warning",    
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Si",
        cancelButtonText: "Cancelar",
        closeOnConfirm: false,
        closeOnCancel: false },

        function(isConfirm){   
            if (isConfirm) 
                swal("¡Hecho!", "El paciente ha sido eliminado", "success");
                window.location.href = "PacienteVer.php";
        });
});
</script> -->

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
                text: "El paciente no fue eliminado",   
                type: "error",    
                confirmButtonColor: "#DD6B55",   
                confirmButtonText: "Intentar de nuevo",   
                closeOnConfirm: false}, 

                function(isConfirm){   
                    if (isConfirm) {     
                        window.location.href = "PacienteVer.php";
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
				text: "Se ha eliminado el paciente",   
				type: "success",    
				confirmButtonColor: "#696565",   
				confirmButtonText: "Ok",   
				closeOnConfirm: false}, 

				function(isConfirm){   
					if (isConfirm) {     
						window.location.href = "PacienteVer.php";
					}
				});
        });
        </script>
        <?php
    }

?>