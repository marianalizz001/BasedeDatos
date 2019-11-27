<?php
    include("Conexion.php");
    
    $idUsuario = $_REQUEST['idUsuario'];
    $jsonString = json_encode($_POST);

    echo $jsonString;

    $jsonArray = json_decode($jsonString, true);

    echo $jsonArray;

    echo $jsonArray['idUsuario'];

 /*
    $consulta= $conexion->prepare("UPDATE Detalle_Paciente SET ant_fam=? WHERE idUsuario=?");
    $consulta->bind_param('si', $var_json, $idUsuario);

 	if($consulta->execute()){
			header('location: PacienteAlta4.php');
 	}else{
		echo "ERROOOOOOOOOOOOOOOR!";
        echo $conexion -> error;
    }

    */
   
?>