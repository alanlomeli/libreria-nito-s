<?php
include 'conexion.php';

    $server="localhost";
    session_start();
    $json_data = json_encode($_SESSION["envio"]);
    echo $_SESSION['envio'];
    print $json_data;
    header('Location: '.$urlBanco.'recibirtotal.php?data='.$json_data);
?>
