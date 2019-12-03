<?php
/*Hace la conexion a la base de datos*/
    header('Content-Type: application/json');
    $pdo=new PDO("mysql:dbname=consultorio;host:127.0.0.1","root","Karma_150");
    $accion = (isset($_GET['accion']))?$_GET['accion']:'leer';


    switch($accion){
        case 'agregar':
            /*Agrega los valores a la BD*/
            $sentenciaSQL = $pdo->prepare("INSERT INTO
            cita(title,nombre,color,textColor,start,end,estatus,monto)
            VALUES(:title,:nombre,:color,:textColor,:start,:end,:estatus,:monto)");
            
            $respuesta=$sentenciaSQL->execute(array(
               "title" => $_POST['title'],
                "nombre" => $_POST['nombre'],
                "color" => $_POST['color'],
                "textColor" => $_POST['textColor'],
                "start" => $_POST['start'],
                "end" => $_POST['end'],
                "estatus" => $_POST['estatus'],
                "monto" => $_POST['monto']
            ));
            echo json_encode($respuesta);
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
            $sentenciaSQL=$pdo->prepare("UPDATE cita SET
            title=:title,
            nombre=:nombre,
            color=:color,
            textColor=:textColor,
            start=:start,
            end=:end,
            estatus=:estatus,
            monto=:monto
            WHERE ID=:ID
            ");
            
            $respuesta=$sentenciaSQL->execute(array(
                "ID"=>$_POST['id'],
                "title" => $_POST['title'],
                "nombre" => $_POST['nombre'],
                "color" => $_POST['color'],
                "textColor" => $_POST['textColor'],
                "start" => $_POST['start'],
                "end" => $_POST['end'],
                "estatus" => $_POST['estatus'],
                "monto" => $_POST['monto']
            ));
            echo json_encode($respuesta);
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
