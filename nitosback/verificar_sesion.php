<?php
include 'conexion.php';
if(isset($_SESSION['Correo'])) {
$tiempo=time();

	$consulta = mysqli_query($conexion,'SELECT * FROM usuario where Correo="'.$_SESSION['Correo'].'"')
          or die("Fallo la consulta");
 $Fila=mysqli_fetch_array($consulta);
 
if( (($tiempo-$Fila["Ultima_Conexion"]) / 60 % 60 	) >5 ){

unset($_SESSION['Correo']);
unset($_SESSION['Cuenta']);
unset($_SESSION['Nombre']);
print '{"success":false}';


}else{
		
    print '{"success":true,"nombre":"'.$_SESSION['Nombre'].'","tipo":'.$_SESSION['Cuenta'].',"tiempo":'.(($tiempo-$Fila["Ultima_Conexion"]) / 60 % 60 ).'}';
	  $update = mysqli_query($conexion,'update usuario set Ultima_Conexion='.$tiempo.'
  	where Correo="'.$_SESSION['Correo'].'"') or die("Fallo la consulta");
          }
}else{
print '{"success":false}';

}




mysqli_close($conexion);

?>
