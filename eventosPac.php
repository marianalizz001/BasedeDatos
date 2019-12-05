<link href="css/sweetalert.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/functions.js"></script>
<script src="js/sweetalert.min.js"></script>

<?php
    session_start();
    include('Conexion.php');

	$idUsuario= $_SESSION['id'];
	//echo $idUsuario;
	$Nombre = $_SESSION['nombre'];
	//echo $Nombre;
	$Fecha=$_REQUEST['fecha_cita'];
	//echo $Fecha;
	$Hora= $_REQUEST['txtHora'];
	//echo $Hora;
	$Titulo= $_REQUEST['txtTitulo'];
	//echo $Titulo;
	$Fecha_Inicial = $Fecha." ".$Hora;
	//echo $Fecha_Inicial;
	$Fecha_Final = $Fecha." ".$Hora;
	//echo $Fecha_Final;

	if ( $Titulo == "Ortodoncia"){
		$color="#0080ff";
	 }
	 if ( $Titulo == "Protesis"){
		$color="#ff8000";
	 }
	 if ( $Titulo == "Estetica dental"){
		$color="#ce00ce";
	 }
	 if ( $Titulo == "Higiene"){
		$color="#00df52";
	 }
	 if ( $Titulo == "Prevencion"){
		$color="#004080";
	 }
	 if ( $Titulo == "Odontopediatria"){
		$color="#d5006b";
	 }
	 if (	$Titulo == "Endodoncia"){
		$color="#ff0606";
	 }
	 if ( $Titulo == "Peridoncia"){
		$color="#1B743A";
	 }
	 if ( $Titulo == "Cirugia dental"){
		$color="#a80b0b";
	 }
	 if ( $Titulo == "Otros"){
		$color="#000000";
	 }

	 $TextColor="#FFFFFF";
 	$consulta= $conexion->prepare("INSERT into cita(title,nombre,color,textColor,start,end,usuario_idUsuario) values (?,?,?,?,?,?,?)");
    
 	$consulta->bind_param('ssssssi',$Titulo,$Nombre,$color,$TextColor,$Fecha_Inicial,$Fecha_Final,$idUsuario);

 	if($consulta->execute()){
		?>
            <script>
            jQuery(function() {
                swal({   
                    title: "¡Bien!",   
                    text: "Se han guardado los datos",   
                    type: "success",    
                    confirmButtonColor: "#696565",   
                    confirmButtonText: "Ok",   
                    closeOnConfirm: false}, 

                    function(isConfirm){   
                        if (isConfirm) {     
                            window.location.href = "CitaVer.php";
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
                        text: "No se han actualizado los datos",   
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
 	}

?>