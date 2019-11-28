<?php
    include("Conexion.php");
    
    $idUsuario = $_REQUEST['idUsuario'];

    unset($_POST['btnEnviar']);
    unset($_POST['idUsuario']);
    $var_json = json_encode($_POST);

    $sql = "UPDATE Detalle_paciente SET exp_fisica = '$var_json' WHERE Usuario_idUsuario = $idUsuario";

    if (mysqli_query($conexion, $sql)) {
        echo "Bien";
        header('location: PacienteAlta7.php?idUsuario='.$idUsuario.'');
    } else {
        echo "Error: " . "<br>" . mysqli_error($conexion);
    }

    mysqli_close($conexion);
?>