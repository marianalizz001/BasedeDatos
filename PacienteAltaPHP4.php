<?php
    include("Conexion.php");
    
    $idUsuario = $_REQUEST['idUsuario'];
    $var_json = json_encode($_POST);

    $sql = "UPDATE Detalle_paciente SET ant_fam = '.$var_json.' WHERE Usuario_idUsuario = $idUsuario";

    if (mysqli_query($conexion, $sql)) {
        echo "New record created successfully";
        header('location: PacienteAlta4.php');
    } else {
        echo "Error: " . "<br>" . mysqli_error($conexion);
    }

    mysqli_close($conexion);

?>