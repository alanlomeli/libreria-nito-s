<?php


include 'conexion.php'; 

$consulta= mysqli_query($conexion,'SELECT usuario_ID,nombre,apellido FROM usuario WHERE Tipo_FK = 3')
or die("Fallo");

$nfilas=mysqli_num_rows($consulta);
$Fila=mysqli_fetch_array($consulta);
    if($nfilas > 0){
    print '[';
    for ($i=0;$i<$nfilas;$i++){
        print '{';
        print '"Numero_de_Empleado":"'.$Fila["usuario_ID"].'",';
        print '"Nombre":"'.$Fila["nombre"].'",';
        print '"Apellido":"'.$Fila["apellido"].'"';
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