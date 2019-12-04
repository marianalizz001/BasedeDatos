<link href="css/sweetalert.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/functions.js"></script>
<script src="js/sweetalert.min.js"></script>

<?php
        include('Conexion.php');
        if(isset($_REQUEST['usuario'])){
            $user = $_REQUEST['usuario'];
            $clave = md5($_REQUEST['clave']);
        
        $instruccion = ("SELECT idUsuario, usuario, passwd, tipo_usuario, nombre, apPat, apMat,genero, f_nac, correo, telefono, foto, especialidad, cedula, foto, curriculum  FROM Usuario WHERE usuario=? and passwd=?");

        $consulta = $conexion->prepare($instruccion);
        $consulta->bind_param("ss", $user, $clave);
        if($consulta->execute()){
            
            $consulta->bind_result($idUsuario, $usuario, $passwd, $tipo_usuario, $nombre, $apPat, $apMat, $genero, $f_nac, $correo, $telefono, $foto, $especialidad, $cedula, $foto, $curriculum);
            $consulta->fetch();
            
            if($user == $usuario and $clave == $passwd){
                session_start();
                $_SESSION['id']=$idUsuario;
                $_SESSION['usuario']=$usuario;
                $_SESSION['tipo']=$tipo_usuario;
                $_SESSION['nombre']=$nombre; 
                $_SESSION['apPat']=$apPat;
                $_SESSION['apMat']=$apMat;
                $_SESSION['log'] = true;
                $_SESSION['genero'] = $genero;
                $_SESSION['f_nac'] = $f_nac;
                $_SESSION['correo'] = $correo;
                $_SESSION['telefono'] = $telefono;
                $_SESSION['foto'] = $foto;
                $_SESSION['especialidad'] = $especialidad;
                $_SESSION['cedula'] = $cedula;
                $_SESSION['foto'] = "Usuarios/Fotos/".$foto;
                $_SESSION['curriculum'] = "Empleados/Curriculums/".$curriculum;
                
                header('location: Inicio.php'); 
                
            }else{
                ?>
                <script>
                jQuery(function() {
                    swal({   
                        title: "¡Error!",   
                        text: "Los datos son incorrectos",   
                        type: "error",    
                        confirmButtonColor: "#DD6B55",   
                        confirmButtonText: "Intentar de nuevo",   
                        closeOnConfirm: false}, 

                        function(isConfirm){   
                            if (isConfirm) {     
                                window.location.href = "login.php";
                            }
                        });
                });
                </script>
                <?php
            }
        }
	}
?>