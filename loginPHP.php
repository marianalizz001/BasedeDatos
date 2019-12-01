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
                echo $conexion -> error;
                ?>
                <html>
                    <link rel="stylesheet" href="css/bootstrap.min.css">
                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                <body>
                <div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header"> Error </div>
                            <div class="modal-body"> Datos incorrectos </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" onclick = "location='login.php'"> Ok </button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <script src="js/jquery.slim.js"></script>
                <script src="js/popper.js"></script>
                <script src="js/bootstrap.min.js"></script>
                <script src="js/scripts.js"></script>  
                <script>
                    $(document).ready(function(){
                        $("#mostrarmodal").modal("show");
                    });
                </script>
            </body>
        </html>
            <?php
            }
        }
	}
?>