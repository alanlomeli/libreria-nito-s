<?php
//Agregar el alter table para modificar el producto

include 'conexion.php';

$ID=$_POST['id'];
$Cantidad=$_POST['cantidad'];
$Precio=$_POST['precio'];

$consulta= mysqli_query($conexion, 'UPDATE producto SET Cantidad = "'.$Cantidad.'" , Precio = "'.$Precio.'"  WHERE Producto_ID = "'.$ID.'"')
or die("Fallo");

 header('Location: '.$frontEndSketis.'articulos.html');

?>
