<?PHP
include 'conexion.php';
date_default_timezone_set('America/Mexico_City');//y la asigno 
$date=date('Y/m/d H:i:s');
if(isset($_SESSION["articulo"])){
$articulos=array_values(array_filter($_SESSION["articulo"]));
$cantidades=array_values(array_filter($_SESSION["cantidad"]));
for($k=0; $k<count($_SESSION["articulo"]); $k++){
$ID_articulo=$articulos[$k];//Id del articulo a restar
$Cantidad=$cantidades[$k];//Cantidad a restar
$succesfully=false;
$consulta = mysqli_query($conexion,'SELECT
                                    Cantidad
                                    FROM
                                    producto
                                    WHERE Producto_ID='.$ID_articulo)
or die("Falló la consulta");
$aux=$consulta->fetch_assoc();//guardo la consulta en una variable string
$result=intval($aux['Cantidad']);//cambio la columna cantidad a int
if($Cantidad<=$result){//si aun hay productos
}
else{
	header('Location: '.$urlBanco.'reembolsar.php');
	exit();
}
}
for($k=0; $k<count($_SESSION["articulo"]); $k++){
$ID_articulo=$articulos[$k];//Id del articulo a restar
$Cantidad=$cantidades[$k];//Cantidad a restar
$succesfully=false;
$consulta = mysqli_query($conexion,'SELECT
                                    Cantidad,Nombre,Precio
                                    FROM
                                    producto
                                    WHERE Producto_ID='.$ID_articulo)
or die("Falló la consulta");
$aux=$consulta->fetch_assoc();//guardo la consulta en una variable string
$result=intval($aux['Cantidad']);//cambio la columna cantidad a int
$precio=intval($aux['Precio']);//lo de arriba pero con precio
$precio=$precio*$Cantidad;//multiplico el precio del producto por la cantidad comprada
if($Cantidad<=$result){//si aun hay productos
    $result=$result-$Cantidad; //restale la cantidad de compra
    $update= "UPDATE producto SET Cantidad=$result WHERE Producto_ID=$ID_articulo";//Variable que guarda mi update
    $updateHistorial = 'INSERT INTO historial (Nombre,Cantidad,Precio,Fecha,FK_usuario) VALUES("'.$aux['Nombre'].'",'.$Cantidad.','.$precio.',"'.$date.'",'.$_SESSION['ID'].')';
    print $updateHistorial;
    if ($conexion->query($update) === TRUE ) {//si los update se han realizado correctamente (articulos e historial )
        if($conexion->query($updateHistorial)== TRUE){
            $succesfully=true;
        }else{
            echo "ERROR";
        }
    }
    else{
        echo "ERROR";
    }
}
else{
	header('Location: '.$urlBanco.'reembolsar.php');
	exit();
}
}
}
mysqli_close($conexion);
?>