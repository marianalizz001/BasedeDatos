<link href="css/sweetalert.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/functions.js"></script>
<script src="js/sweetalert.min.js"></script>

<?php
    include("Conexion.php");
    session_start();
    $idUsuario = $_REQUEST['idUsuario'];
    $passwd = $_REQUEST['passwd'];
    $passwd = md5($passwd);

    $sql = "UPDATE vista_usuario SET  passwd = '$passwd' WHERE idUsuario = $idUsuario";

    if (mysqli_query($conexion, $sql)) {
        if ($idUsuario == $_SESSION['id']){
            ?>
            <script>
            jQuery(function() {
                swal({   
                    title: "¡Bien!",   
                    text: "Se ha cambiado la contraseña",   
                    type: "success",    
                    confirmButtonColor: "#696565",   
                    confirmButtonText: "Ok",   
                    closeOnConfirm: false}, 
    
                    function(isConfirm){   
                        if (isConfirm) {     
                            window.location.href = "PerfilUsuario.php";
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
                    text: "Se ha cambiado la contraseña",   
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
    } else {
        if ($idUsuario == $_SESSION['id']){
            ?>
                <script>
                jQuery(function() {
                    swal({   
                        title: "¡Error!",   
                        text: "No se ha cambiado la contraseña",   
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
            }else{
                ?>
                <script>
                jQuery(function() {
                    swal({   
                        title: "¡Error!",   
                        text: "No se ha cambiado la contraseña",   
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
            } 
        }  
    
?>


