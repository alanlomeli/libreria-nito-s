<?PHP

include 'conexion.php';
$consulta = mysqli_query($conexion,'SELECT *FROM
                                    historial
                                    WHERE FK_usuario='.$_SESSION['ID'])
or die("Fallo la consulta");

$nfilas=mysqli_num_rows($consulta);
$Fila=mysqli_fetch_array($consulta);
    if($nfilas > 0){
    print '[';
    for ($i=0;$i<$nfilas;$i++){
        print '{';
        print '"nombre":"'.$Fila["Nombre"].'",';
        print '"cantidad":"'.$Fila["Cantidad"].'",';
        print '"fecha":"'.$Fila["Fecha"].'",';
        print '"precio":"'.$Fila["Precio"].'"';
        if($i==$nfilas-1){
        print "}";
        }else{
        print "},";
        }
        $Fila=mysqli_fetch_array($consulta);
}
print "]";
}
mysqli_close($conexion);
?>