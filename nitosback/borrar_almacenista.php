<?php

include 'conexion.php'; 

$Usuario_ID =$_POST['number'];

mysqli_query($conexion,'DELETE FROM usuario WHERE Usuario_ID = '.$Usuario_ID.';')
or die("Fallo");

mysqli_close ($conexion);
?>
