	<?php
include 'conexion.php';
	$update = mysqli_query($conexion,'update usuario set Ultima_Conexion=0 where Correo="'.$_SESSION['Correo'].'"')
          or die("Fallo la consulta");


unset($_SESSION['Correo']);
unset($_SESSION['Cuenta']);
unset($_SESSION['Nombre']);

echo '{"success":true}';
mysqli_close($conexion);

?>
