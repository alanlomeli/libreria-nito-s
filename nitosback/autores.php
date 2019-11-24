
<?PHP

include 'conexion.php';
$consulta = mysqli_query($conexion,'SELECT
                                    articulo.Nombre,
                                    articulo.Foto,
                                    articulo.Descripcion
                                    FROM
                                    articulo ')
or die("Fallo la consulta");

$nfilas=mysqli_num_rows($consulta);
$Fila=mysqli_fetch_array($consulta);
    if($nfilas > 0){
    print '[';
    for ($i=0;$i<$nfilas;$i++){
        print '{';
        print '"Nombre":"'.$Fila["Nombre"].'",';
                print '"Foto":"'.$Fila["Foto"].'",';
        print '"Descripcion":"'.$Fila["Descripcion"].'"';
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





