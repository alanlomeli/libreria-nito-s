<?php
include 'conexion.php';
$tiempo=time();
				if (isset($_POST['correo']) && isset($_POST['contrasena'])){
					$mail=$_POST["correo"];
					$pass=$_POST["contrasena"];
					$consulta = mysqli_query($conexion,'SELECT * FROM usuario where Correo="'.$mail.'" && Contrasena="'.$pass.'"')
          or die("Fallo la consulta");
          $nfilas=mysqli_num_rows($consulta);
          $Fila=mysqli_fetch_array($consulta);
						if ($nfilas==1){        //Si hubo coincidencia de contraseña y correo
						         if($Fila["Ultima_Conexion"]==="0"){ //Se sabe qur no  hay sesion activa
						          $_SESSION['Correo']= $mail;
                                  $_SESSION['Cuenta']= $Fila['Tipo_FK'];
                                  $_SESSION['Nombre']=$Fila['Nombre'];
                                  $_SESSION['Apellido']=$Fila['Apellido'];
                                  $_SESSION['ID']=$Fila['Usuario_ID'];//lo cambie yoo***
                                  $consulta = mysqli_query($conexion,'UPDATE usuario set Ultima_Conexion='.$tiempo.' where Correo="'.$_SESSION['Correo'].'"')
                                   or die("Fallo la consulta3");
						                 echo'{"success":true}';
						         }else{ //Checar cuando fue la ultima interaccion con esa cuenta
                                        if( ((($tiempo-$Fila["Ultima_Conexion"]) / 60 % 60) <5)){
                                            echo'{"success":false,"mensaje":"ACTIVA","ultimo":'.(($tiempo-$Fila["Ultima_Conexion"]) / 60 % 60).'}';
                                                   }else{
                                               $_SESSION['Correo']= $mail;
                                               $_SESSION['Cuenta']= $Fila['Tipo_FK'];
                                               $_SESSION['Nombre']=$Fila['Nombre'];
                                               $_SESSION['Apellido']=$Fila['Apellido'];
                                               $_SESSION['ID']=$Fila['Usuario_ID'];//lo cambie yoo***
                                               $consulta = mysqli_query($conexion,'UPDATE usuario set Ultima_Conexion='.$tiempo.' where Correo="'.$_SESSION['Correo'].'"')
                                                or die("Fallo la consulta3");
                                        echo'{"success":true}';
                                        }
}
						}else{
							echo'{"success":false}';
						}
				}else{ //Si hubo coincidencia de contraseña y correo
					echo "Por favor, llena todos los campos.";
				}
mysqli_close($conexion);
?>