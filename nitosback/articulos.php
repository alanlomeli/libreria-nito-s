
<?PHP

include 'conexion.php';
$tipo=3;
if(isset($_POST['tipo']))
$tipo=$_POST['tipo'];
$consulta = mysqli_query($conexion,'SELECT
                                    producto.Producto_ID,
                                    producto.Nombre,
                                    producto.Foto,
                                    producto.Modelo,
                                    producto.Precio
                                    FROM
                                    producto
                                    WHERE Cantidad>0 && Articulo_FK='.$tipo)
or die("Fallo la consulta");

$nfilas=mysqli_num_rows($consulta);
$Fila=mysqli_fetch_array($consulta);
    if($nfilas > 0){
    print '[';
    for ($i=0;$i<$nfilas;$i++){
        print '{';
        print '"ID":"'.$Fila["Producto_ID"].'",';
        print '"Nombre":"'.$Fila["Nombre"].'",';
        print '"Foto":"'.$Fila["Foto"].'",';
        print '"Modelo":"'.$Fila["Modelo"].'",';
        print '"Precio":"'.$Fila["Precio"].'"';
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





