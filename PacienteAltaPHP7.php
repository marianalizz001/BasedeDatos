<?php
    include("Conexion.php");
    
    $idUsuario = $_REQUEST['idUsuario'];

    unset($_POST['btnEnviar']);
    unset($_POST['idUsuario']);
    $var_json = json_encode($_POST);

    $sql = "UPDATE Detalle_paciente SET ex_compl = '$var_json' WHERE Usuario_idUsuario = $idUsuario";

    if (mysqli_query($conexion, $sql)) {
        echo "Bien";
        header('location: PacienteAlta8.php?idUsuario='.$idUsuario.'');
    } else {
        echo "Error: " . "<br>" . mysqli_error($conexion);
    }

    mysqli_close($conexion);
?>