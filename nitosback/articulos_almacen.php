
<?PHP
include 'conexion.php';
//Lista articulos almacen
$consulta = mysqli_query($conexion,'select producto.Producto_ID as id, producto.Nombre as nombre, producto.Descripcion as descripcion, producto.Modelo as modelo, producto.Cantidad as cantidad,
    producto.Precio as precio, producto.Foto as foto, marca.Nombre as marca, articulo.Nombre as tipo
    from producto
    inner join marca on producto.Marca_FK = marca.Marca_ID
    inner join articulo on producto.Articulo_FK = articulo.Articulo_ID ;')
or die("Fallo la consulta");
$nfilas=mysqli_num_rows($consulta);
$Fila=mysqli_fetch_array($consulta);
    if($nfilas > 0){
    echo '[';
    for ($i=0;$i<$nfilas;$i++){
        echo '{';
		        echo '"id":"'.$Fila["id"].'",';

        echo '"nombre":"'.$Fila["nombre"].'",';
        echo '"descripcion":"'.$Fila["descripcion"].'",';
        echo '"modelo":"'.$Fila["modelo"].'",';
        echo '"cantidad":"'.$Fila["cantidad"].'",';
        echo '"precio":"'.$Fila["precio"].'",';
        echo '"foto":"'.$Fila["foto"].'",';
        echo '"marca":"'.$Fila["marca"].'",';
        echo '"tipo":"'.$Fila["tipo"].'"';
        if($i==$nfilas-1){
        echo "}";
        }else{
        echo "},";
        }
        $Fila=mysqli_fetch_array($consulta);
}
echo "]";
}
mysqli_close($conexion);
?>

