<?PHP
include 'conexion.php';
if(isset($_COOKIE["datos"])){
  $datos = json_decode($_COOKIE["datos"], true);
  if(isset($datos["cantidad"]))
  $_SESSION["cantidad"] = $datos["cantidad"];
  if(isset($datos["precio"]))
  $_SESSION["precio"] = $datos["precio"];
  $_SESSION["total"] = $datos["total"];
  if(isset($datos["articulo"]))
  $_SESSION["articulo"] = $datos["articulo"];
  $_SESSION["id"] = $datos["id"];
}
$_SESSION["envio"] = array();
if(isset($_SESSION["articulo"])){
$consulta = mysqli_query($conexion,'SELECT
                                    producto.Producto_ID,
                                    producto.Nombre,
                                    producto.Foto,
                                    producto.Modelo,
                                    producto.Precio,
                                    producto.Cantidad
                                    FROM
                                    producto')
or die("Fallo la consulta");
$bool=false;
$actual=-1;

$cuenta=count($_SESSION["articulo"]);


$articulos=array_values(array_filter($_SESSION["articulo"]));
$cantidad=array_values(array_filter($_SESSION["cantidad"]));

$nfilas=mysqli_num_rows($consulta);
if($cuenta!=0){
print "[";
    for ($k=0;$k<$cuenta;$k++){
    mysqli_data_seek($consulta, 0);
        while($Fila = mysqli_fetch_array($consulta)){
        if($Fila["Producto_ID"]==$articulos[$k]){
           print '{';
                              print '"ID":"'.$Fila["Producto_ID"].'",';
                              print '"Nombre":"'.$Fila["Nombre"].'",';
                              print '"Foto":"'.$Fila["Foto"].'",';
                              print '"Modelo":"'.$Fila["Modelo"].'",';
                              print '"Cantidad":"'.$cantidad[$k].'",';
                              print '"Total":"'.$_SESSION["total"].'",';
                              print '"Precio":"'.$Fila["Precio"].'"';
                              print "}";

                              $_SESSION["envio"][$k]["Cantidad"]=$cantidad[$k];
                              $_SESSION["envio"][$k]["Nombre"]=$Fila["Nombre"];
                              $_SESSION["envio"][$k]["Total"]=$_SESSION["total"];
                              if($k!=$cuenta-1){
                              print ",";
                              }
          break;
        }
}
}
print "]";
}
mysqli_close($conexion);
}else{

}
?>
