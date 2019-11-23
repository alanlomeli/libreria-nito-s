<?php
include 'conexion.php';

if(isset($_SESSION['Apellido'])) {
print '{"success":true,"apellido":"'.$_SESSION['Apellido'].'"}';
}else{
print '{"success":false}';

}


mysqli_close($conexion);

?>
