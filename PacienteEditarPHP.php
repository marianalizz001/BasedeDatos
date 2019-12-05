<link href="css/sweetalert.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/functions.js"></script>
<script src="js/sweetalert.min.js"></script>
<?php
    include("Conexion.php");
    $opc=$_POST['opc'];
    $idCita=$_POST['idCita'];
    $idUsuario=$_POST['idUsuario'];
    
    if($opc=='1'){
        $instruccion=$conexion->prepare("UPDATE cita SET estatus='1' where id=$idCita");
        if($instruccion->execute()){
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
    }elseif($opc=='2'){
        $instruccion2=$conexion->prepare("UPDATE cita SET estatus='0' where id=$idCita");
        if($instruccion2->execute()){
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
    }
    

?>