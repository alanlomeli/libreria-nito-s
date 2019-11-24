<?php
include 'conexion.php';

$consulta= mysqli_query($conexion,'SELECT fecha,hora,titulo,descripcion from eventos ORDER BY fecha')
or die("Fallo");

$nfilas=mysqli_num_rows($consulta);
$Fila=mysqli_fetch_array($consulta);
    if($nfilas > 0){
    print '[';
    for ($i=0;$i<$nfilas;$i++){
        print '{';
        print '"Titulo":"'.$Fila["titulo"].'",';
        print '"Fecha":"'.$Fila["fecha"].'",';
        print '"Hora":"'.$Fila["hora"].'",';
        print '"Descripcion":"'.$Fila["descripcion"].'"';
        if($i==$nfilas-1){
        print "}";
        }else{
        print "},";
        }
        $Fila=mysqli_fetch_array($consulta);
}
print "]";
}

mysqli_close ($conexion);
?>