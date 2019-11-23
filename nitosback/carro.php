<?PHP

include 'conexion.php';

if (!isset($_SESSION["total"]) ) {
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
    else{
    $_SESSION["total"] = 0;
    $_SESSION["id"] = 0;
  }
}
$i=1;
if (isset($_POST['reset']) || isset($_SESSION["reset"]))
 {
   unset($_SESSION["cantidad"]);
   unset($_SESSION["precio"]);
   unset($_SESSION["total"]);
   unset($_SESSION["articulo"]);
   unset($_SESSION["reset"]);
   $_SESSION["id"]=0;
   $total=0;
   unset($_COOKIE["datos"]);
 }

if (isset($_POST["Add"]) )
   {
   $id = $_POST["Add"];
   $i = $_SESSION["id"]+1;
   $cuenta=$_SESSION["id"];
   $_SESSION["id"]=$i;
   for ($k=1;$k<=$cuenta;$k++){
     if($id==$_SESSION["articulo"][$k]){
      $i = $k;
      $d = $_SESSION["id"]-1;
      $_SESSION["id"]=$d;
      break;
     }
   }
   $precio = $_POST["Precio"];
   if(!isset($_SESSION["cantidad"][$i]))
   $_SESSION["cantidad"][$i]=0;
   $cantidad = $_SESSION["cantidad"][$i] + 1;
   $_SESSION["precio"][$i] = $precio * $cantidad;
   $_SESSION["articulo"][$i] = $id;
   $_SESSION["cantidad"][$i] = $cantidad;
   $total = $_SESSION["total"] + $precio;
   $_SESSION["total"] = $total;
}

if (isset($_POST["delete"]) )
   {
    $id = $_POST["delete"];
    $i=0;
    $cuenta=$_SESSION["id"];
    for ($k=1;$k<=$cuenta;$k++){
     if($id==$_SESSION["articulo"][$k]){
      $i = $k;
     }
    }
    if($i!=0){
    $precio= $_POST["precio"];
    $cant = $_POST["cantidad"];
    $cantidad = $_SESSION["cantidad"][$i] - $cant;
    $_SESSION["cantidad"][$i] = $cantidad;
    $total = $_SESSION["total"] - $precio * $cant;
    $_SESSION["total"] = $total;
    $precio = $_SESSION["precio"][$i] - $precio;
    $_SESSION["precio"][$i] = $precio;
    
    if ($cantidad<=0) {
     $d = $_SESSION["id"]-1;
     $_SESSION["id"]=$d;
     for ($k=$i;$k<$cuenta;$k++){
        $_SESSION["precio"][$k] = $_SESSION["precio"][$k+1];
        $_SESSION["articulo"][$k] = $_SESSION["articulo"][$k+1];
        $_SESSION["cantidad"][$k] = $_SESSION["cantidad"][$k+1];
     }
     unset($_SESSION["articulo"][$cuenta]);
     unset($_SESSION["precio"][$cuenta]);
     unset($_SESSION["cantidad"][$cuenta]);
     unset($_SESSION["articulo"][$cuenta]);
     if($_SESSION["id"]==0)
      unset($_SESSION["total"]);
     }
    }
  }
  $datos = array();
  if(isset($_SESSION["cantidad"]))
  $datos["cantidad"] = $_SESSION["cantidad"];
  if(isset($_SESSION["precio"]))
  $datos["precio"] = $_SESSION["precio"];
  $datos["total"] = $_SESSION["total"];
  if(isset($_SESSION["articulo"]))
  $datos["articulo"] = $_SESSION["articulo"];
  $datos["id"] = $_SESSION["id"];
  setcookie("datos",json_encode($datos),time()+(24*60*60));

  $total = $_SESSION["total"];
  print '{"Total":"'.$total.'"}';
?>
