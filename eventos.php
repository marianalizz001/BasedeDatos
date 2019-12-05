
<?php
/*Hace la conexion a la base de datos*/
    header('Content-Type: application/json');
    $pdo=new PDO("mysql:dbname=consultorio;host:127.0.0.1","root","");
    $accion = (isset($_GET['accion']))?$_GET['accion']:'leer';

    switch($accion){
        case 'agregar':
            /*Agrega los valores a la BD*/
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
                if($diaSemana == 0){
                    $b=1;
                }
            }   
            if ($b==0){
                $sentenciaSQL = $pdo->prepare("INSERT INTO
                cita(title,nombre,color,textColor,start,end)
                VALUES(:title,:nombre,:color,:textColor,:start,:end)");
        
                $respuesta=$sentenciaSQL->execute(array(
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
                $result1=mysqli_query($conexion,$sql1);
                
            
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
                if($diaSemana ==6 && ($horaN!="10:00:00" || $horaN!="11:00:00" )){
                    $b=1;
                }
                if($diaSemana == 0){
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
            //seleccionar los eventos del calendario para mostrarlos siempre
            $sentenciaSQL= $pdo->prepare("SELECT * FROM cita");
            $sentenciaSQL->execute();

            $resultado= $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($resultado);
            break;
    }
    
?>
