<?php
include 'conexion.php';

if(isset($_SESSION['Correo'])) {
print '{"success":true,"correo":"'.$_SESSION['Correo'].'"}';
}else{
print '{"success":false}';

}




mysqli_close($conexion);

?>
