<?PHP

/**
 * @ author deadchri5
 */

include 'conexion.php';

$nombre=$_POST["nombre"];
$apellido=$_POST["apellido"];
$correo=$_POST["correo"];
$contraseña=$_POST["contraseña"];
$confirmar=$_POST["confirmar"];
$estado = false;

$valoresPermitidos="abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ ";
$espacio=" ";
$validarEspacioN=substr($nombre,0,1);
  if($validarEspacioN===$espacio)
  {
    echo '<script src = "'.$frontEndSketis.'Assets/js/datosEN.js"> </script>';
    return false;
  }
$validarEspacioA=substr($apellido,0,1);
  if($validarEspacioA===$espacio)
  {
    echo '<script src = "'.$frontEndSketis.'Assets/js/datosEA.js"> </script>';
    return false;
  }
  if (strlen($nombre)<3)
  {
    echo '<script src = "'.$frontEndSketis.'Assets/js/datosMN.js"> </script>';
    return false;
  }
  if (strlen($apellido)<3)
  {
    echo '<script src = "'.$frontEndSketis.'Assets/js/datosMA.js"> </script>';
    return false;
  }
  if (strlen($contraseña)<3)
  {
    echo '<script src = "'.$frontEndSketis.'Assets/js/datosMCon.js"> </script>';
    return false;
  }
for ($i=0; $i<strlen($nombre); $i++)
{
  if(strpos($valoresPermitidos,substr($nombre,$i,1))===false)
  {
    echo '<script src = "'.$frontEndSketis.'Assets/js/datosIN.js"> </script>';
    return false;
  }
}
 for ($i=0; $i<strlen($apellido); $i++)
  {
    if(strpos($valoresPermitidos,substr($apellido,$i,1))===false)
    {
        echo '<script src = "'.$frontEndSketis.'Assets/js/datosIA.js"> </script>';
      return false;
    }
  }

if ($contraseña != $confirmar){
    echo '
    <html>
        <head>
            <meta charset="utf-8" />
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <title>Skaters - Status</title>
            <link rel="shortcut icon" href="../../Vistas/Assets/icons/logo_header.png" />
            <body>
           <script src = "'.$frontEndSketis.'Assets/js/claveError.js"> </script>
           </body>
        </head>
    </html>
    ';
}
else{

    $verificaCorreo = mysqli_query($conexion, "select Correo from usuario") or die ("Fallo en la consulta correo");
    $verifica=mysqli_fetch_array($verificaCorreo);
    $numero = mysqli_num_rows($verificaCorreo);

    for ($i = 0; $i <= $numero; $i++){
        if ($correo == $verifica["Correo"]){
            $estado = true;
        }
        $verifica=mysqli_fetch_array($verificaCorreo);
    }
        if ($estado){ //Si se encontro un correo igual en la base de datos (No permitir registro).
            echo '
            <html>
    <head>
            <meta charset="utf-8" />
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <title>Skaters - Status</title>
            <link rel="shortcut icon" href="'.$frontEndSketis.'Assets/icons/logo_header.png" />
            <script>
                    function r() { location.href="'.$frontEndSketis.'skaters/registro.html"}
                    setTimeout ("r()", 3500);
                    </script>
            <style>


            </style>
    </head>
    <body>
        <tr>
            <td> <img class="okimage" src="'.$frontEndSketis.'Assets/icons/err_icon.png"/> </td>
            <td><p class="texto">Error: El correo que ingresaste ya existe en el sistema
             </br> seras redireccionado automaticamente....</p></td>
        </tr>
    </body>
</html>
            ';
        }
        else { //Si no se encontro correo igual, permite el registro.
            $consulta = mysqli_query($conexion, "insert into usuario (Tipo_FK, Nombre, Apellido, Correo, Contrasena,Ultima_Conexion)
            values ('1', '$nombre', '$apellido', '$correo', '$contraseña',0)")
            or die("Fallo la consulta </br>");

            echo '
        <html>
    <head>
            <meta charset="utf-8" />
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <title>Skaters - Status</title>
            <link rel="shortcut icon" href="'.$frontEndSketis.'Assets/icons/logo_header.png" />
            <script>
                    function r() { location.href="'.$frontEndSketis.'/login.html"}
                    setTimeout ("r()", 0);
                    </script>
            <style>

            </style>
    </head>
    <
</html>
        ';
        }

    }
mysqli_close($conexion);
?>
