<?PHP
$varHeader="http://localhost";  //Poner url del frontend sketis
$urlBanco="http://localhost/cetipay/PHP/";
$frontEndSketis=$varHeader."/sketis/";
session_start();
header("Access-Control-Allow-Origin: ".$varHeader);
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE, UPDATE,OPTIONS");
header("Access-Contol-Allow-Headers: Origin, X-Requested-With, X-HTTP-Method-Override,Content-Type");
header("Access-Control-Allow-Credentials: true");

$conexion=mysqli_connect("localhost","root","")
or die("No se puede conectar con el servidor");

mysqli_select_db($conexion, "skaters")
or die("No se puede conectar a la base de datos.");


?>
