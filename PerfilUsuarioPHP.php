<link href="css/sweetalert.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/functions.js"></script>
<script src="js/sweetalert.min.js"></script>

<?php
    include("Conexion.php");
    $idUsuario = $_REQUEST['idUsuario'];
    $tipo = $_REQUEST['tipo'];
    $correo = $_REQUEST['correo'];
    $telefono = $_REQUEST['telefono'];
    $localidad = $_REQUEST['localidad'];
    $calle = $_REQUEST['calle'];
    $no_ext = $_REQUEST['no_ext'];
    $no_int = $_REQUEST['no_int'];
    $cp = $_REQUEST['cp'];
    $colonia = $_REQUEST['colonia'];

    $nombre_archivo = $_FILES[ 'archivo' ][ 'name' ];
    $tmp = $_FILES[ 'archivo' ][ 'tmp_name' ];
    $tipoFile = $_FILES['archivo']['type'];
    $folder = 'Usuarios/Fotos';
    $nombre_foto = utf8_decode($nombre_archivo);


    if ($nombre_foto != ""){
        if(($tipoFile == "image/jpg" || $tipoFile == "image/png" || $tipoFile == "image/gif" || $tipoFile == "image/jpeg")){ 
            if(move_uploaded_file($tmp,$folder.'/'.$nombre_foto)){
                echo "Se ha grabado correctamente el archivo"; 
                $consulta= $conexion->prepare("UPDATE Usuario SET foto=? WHERE idUsuario=?");
                $consulta->bind_param('si', $nombre_foto, $idUsuario);
                if($consulta->execute()){
                        echo "si";
                }else{
                ?>
                    <script>
                    jQuery(function() {
                        swal({   
                            title: "¡Error!",   
                            text: "No se ha cargado la fotografía",   
                            type: "error",    
                            confirmButtonColor: "#DD6B55",   
                            confirmButtonText: "Intentar de nuevo",   
                            closeOnConfirm: false}, 
        
                            function(isConfirm){   
                                if (isConfirm) {     
                                    window.location.href = "PerfilUsuario.php";
                                }
                            });
                    });
                    </script>
                <?php
                }
            }else
                $nombre_foto = "";
        }
    }

 	$consulta= $conexion->prepare("UPDATE Usuario SET   correo=?, telefono=?, calle=?, no_ext=?, no_int=?, colonia=?, cp=?, localidades_idlocalidades=? WHERE idUsuario=?");
    $consulta->bind_param('ssssssssi', $correo, $telefono, $calle, $no_ext, $no_int, $colonia, $cp, $localidad, $idUsuario);

 	if($consulta->execute()){
        ?>
            <script>
            jQuery(function() {
                swal({   
                    title: "¡Bien!",   
                    text: "Se han actualizado los datos",   
                    type: "success",    
                    confirmButtonColor: "#696565",   
                    confirmButtonText: "Ok",   
                    closeOnConfirm: false}, 

                    function(isConfirm){   
                        if (isConfirm) {     
                            window.location.href = "Inicio.php";
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
                                window.location.href = "PerfilUsuario.php";
                            }
                        });
                });
                </script>
            <?php
    }

?>


