<?php
     require_once __DIR__ . "/vendor/autoload.php";

     $conexion = new MongoDB\Client('mongodb+srv://Karen:Aloha98@cluster0-rzcxc.mongodb.net/Consultorio?retryWrites=true&w=majority');
     $bd = $conexion->selectDatabase('Consultorio');
?>