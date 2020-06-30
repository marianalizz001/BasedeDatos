<?php
 include ('Conexion.php');
 session_start();
 $idUsuario = $_SESSION['_id'];
 $Titulo= $_POST['title'];
 $Nombre = $_POST['nombre'];
 $color=$_POST['color'];
 $TextColor= $_POST['textColor'];
 $start= $_POST['start'];
 $end= $_POST['end'];

/*Hace la conexion a la base de datos*/
    header('Content-Type: application/json');
    $accion = (isset($_GET['accion']))?$_GET['accion']:'leer';

    switch($accion){
        case 'agregar':
           
            /*Agrega los valores a la BD*/
           
            $consulta = $bd->Cita->find([]);
           
            $b=0;
             foreach ($consulta as $act){
                $id = $act['_id'];
                $start = $act['start'];
                //echo $start;
                $fechacompleta =explode(" ", $act['start']); 
                $fecha=$fechacompleta[0];
                $hora=$fechacompleta[1];
                echo $fecha . "\n";
                
                $fechacompletaN =explode(" ", $_POST['start']); 
                        
                $fechaN=$fechacompletaN[0];
                $horaN=$fechacompletaN[1];
                echo $fechaN . "\n";
                echo $horaN;
                $diaSemana = date('w', strtotime($fechaN));

                $hoy=date('Y-m-d');
                if($fechaN < $hoy ){
                    $b=1;
                }
                if(($fecha==$fechaN && $hora==$horaN)){
                   $b=1;
                   
                }
                if($diaSemana ==6 && ($horaN!="10:00:00" || $horaN!="11:00:00" )){
                    $b=1;
                }
            }   
            
            if ($b==0){
              /*  $sentenciaSQL = $pdo->prepare("INSERT INTO
                cita(title,nombre,color,textColor,start,end)
                VALUES(:title,:nombre,:color,:textColor,:start,:end)");*/

                $consulta = $bd->Cita->insertOne([
                    'title' => $Titulo,
                    'nombre' => $Nombre,
                    'color' => $color,
                    'textColor' => $TextColor,
                    'start' => $start,
                    'end' => $end,
                    'estatus' => NULL,
                    'odontograma' => NULL,
                    'Usuario_idUsuario' => $idUsuario
               ]);
               if($consulta->getInsertedCount() > 0){
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
                                window.location.href = "javascript:window.history.back()";
                            }
                        });
                });
                </script>
            <?php 
            } else{	
            ?>
                    <script>
                    jQuery(function() {
                        swal({   
                            title: "¡Error!",   
                            text: "Cita NO disponible",   
                            type: "error",    
                            confirmButtonColor: "#DD6B55",   
                            confirmButtonText: "Intentar de nuevo",   
                            closeOnConfirm: false}, 
        
                            function(isConfirm){   
                                if (isConfirm) {     
                                    window.location.href = "CitaVer.php";
                                }
                            });
                    });
                    </script>
                <?php
         }
        
               /* $respuesta=$sentenciaSQL->execute(array(
                "title" => $_POST['title'],
                "nombre" => $_POST['nombre'],
                "color" => $_POST['color'],
                "textColor" => $_POST['textColor'],
                "start" => $_POST['start'],
                "end" => $_POST['end']
                ));

                echo json_encode($respuesta);
                $conexion = new mysqli ('localhost','root','','Consultorio');
                $sql1="call p4()";
                $result1=mysqli_query($conexion,$sql1);*/
                
            
            }
            header('Location: Citas.php');     
            break;
            
        case 'eliminar':
            $respuesta=false;
            
            if(isset($_POST['id'])){
                $sentenciaSQL= $pdo->prepare("DELETE FROM
                cita WHERE ID=:ID");
                $respuesta= $sentenciaSQL->execute(array("ID"=>$_POST['id']));
            }
            echo json_encode($respuesta);
            break; 
            
        case 'modificar':
            //Instruccion para modificar
            //echo "Instruccion modificar";

            $conexion = new mysqli ('localhost','root','','Consultorio');
            $instruccion="select * from cita";
            if(! $resultado = $conexion -> query($instruccion)){
                echo "Ha sucedido un problema ... ";
                exit();
            }
            $b=0;

           

            while ($act = $resultado -> fetch_assoc()){
                $id = $act['id'];
                

                $fechacompleta =explode(" ", $act['start']); 
                $fecha=$fechacompleta[0];
                $hora=$fechacompleta[1];

                $fechacompletaN =explode(" ", $_POST['start']); 
                print_r($fechacompletaN);
                $fechaN=$fechacompletaN[0];
                $horaN=$fechacompletaN[1];

                $diaSemana = date('w', strtotime($fechaN));
                $idN = $_POST['id'];

                $hoy=date('Y-m-d');
                if($fechaN < $hoy ){
                    $b=1;
                }
                if(($fecha==$fechaN && $hora==$horaN) && $id!=$idN){
                   $b=1;
                }
                if($diaSemana ==6 && !($horaN=="10:00:00" || $horaN=="11:00:00" ) && $id!=$idN){
                    $b=1;
                }
            }  
            if($b==0){
                $sentenciaSQL=$pdo->prepare("UPDATE cita SET
                title=:title,
                nombre=:nombre,
                color=:color,
                textColor=:textColor,
                start=:start,
                end=:end
                WHERE ID=:ID
                ");
                
                $respuesta=$sentenciaSQL->execute(array(
                    "ID"=>$_POST['id'],
                    "title" => $_POST['title'],
                    "nombre" => $_POST['nombre'],
                    "color" => $_POST['color'],
                    "textColor" => $_POST['textColor'],
                    "start" => $_POST['start'],
                    "end" => $_POST['end']
                ));
                echo json_encode($respuesta);
            }
            header('Location: Citas.php');    
            break;
            
        default:
        include("Conexion.php");
        header('Content-Type: application/json');
        $cont="";
        $consulta = $bd->Cita->find();
        $consulta2 = $bd->Cita->count();
        $ini="[";
        $contador=1;
        foreach($consulta as $act){
            if($contador==$consulta2){
                $cont=$cont.json_encode($act);
            }else{
                $cont=$cont.json_encode($act).",";
            }
            $contador++;
         }
         $fin="]";
         $todo=$ini.$cont.$fin;
         echo $todo;
    
        break;
    }
    
?>
