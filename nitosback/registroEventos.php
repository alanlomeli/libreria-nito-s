<?php

include 'conexion.php';

$titulo = $_POST["titulo"];
$descripcion = $_POST["descripcion"];
$fecha = $_POST["fecha"];
$hora = $_POST["hora"];

$consulta = mysqli_query($conexion,
"insert into eventos (Titulo, Descripcion, Fecha, Hora)
values ('$titulo', '$descripcion', '$fecha', '$hora')")
or die ("Error en consulta");

echo '
<html>
    <head>
            <meta charset="utf-8" />
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <title>Skaters - ok</title>
            <link rel="shortcut icon" href="'.$frontEndSketis.'Assets/icons/logo_header.png" />
            <script>
                    location.href="'.$frontEndSketis.'eventos.html";
                    </script>
    </head>

</html>
';

    mysqli_close($conexion);
?>
