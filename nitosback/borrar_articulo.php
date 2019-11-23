<?php

include 'conexion.php'; 

$Articulo_ID =$_POST['number'];
$ID_Borrar;

$consulta= mysqli_query($conexion,'select producto.Producto_ID as id, articulo.Nombre as tipo, producto.Nombre as nombre, 
producto.Modelo as modelo, producto.Descripcion as descripcion, producto.Foto as foto, producto.Cantidad AS cantidad
 FROM articulo INNER JOIN producto 
ON producto.Articulo_FK = articulo.Articulo_ID;')
or die("Fallo");

$nfilas=mysqli_num_rows($consulta);
$Fila=mysqli_fetch_array($consulta);

if($nfilas > 0){
    for ($i=0;$i<$Articulo_ID+1;$i++){
        $ID_Borrar = $Fila['id'];
        $Fila=mysqli_fetch_array($consulta);
}
}

mysqli_query($conexion,'DELETE FROM producto WHERE Producto_ID = '.$ID_Borrar.';')
or die("Fallo");

mysqli_close ($conexion);
?>
