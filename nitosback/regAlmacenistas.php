<?php
/**
 * author Liloth00814 wakala
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
            <link rel="shortcut icon" href="'.$frontEndSketis.'Assets/icons/logo_header.png" />
            <script>
                    function r() { location.href="'.$frontEndSketis.'registro-almacenista.html"}
                    setTimeout ("r()", 5000);
                    </script>
            <style>
            body{
                background-color: #ef7979;
                }
            .okimage{
                display:block;
                margin-left: auto;
                margin-right: auto;
                margin-top: 200px;
                height: 200px;
                width: 200px;
            }
            .texto{
                text-align: center;
                font: oblique bold 120% cursive;
                font-size: 200%;
                color: #FFF;
            }
            </style>
    </head>
    <body>
        <tr>
            <td> <img class="okimage" src="'.$frontEndSketis.'Assets/icons/err_icon.png"/> </td>
            <td><p class="texto">Error: la contraseña no es igual en ambos campos </br> seras redireccionado automaticamente....</p></td>
        </tr>
    </body>
</html>
    ';
}

else{

    $verificaCorreo = mysqli_query($conexion, "select Correo from usuario") or die ("Fallo en la consulta correo");
    $verifica=mysqli_fetch_array($verificaCorreo);
    $cantidad=mysqli_num_rows($verificaCorreo);
    for ($i=0; $i<=$cantidad; $i++)
    {
      if ($correo==$verifica["Correo"])
      {
        $estado=true;
      }
      $verifica=mysqli_fetch_array($verificaCorreo);
    }
    if ($estado==true){
      echo '
      <html>
<head>
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Skaters - Status</title>
      <link rel="shortcut icon" href="'.$frontEndSketis.'Assets/icons/logo_header.png" />
      <script>
              function r() { location.href="'.$frontEndSketis.'registro-almacenista.html"}
              setTimeout ("r()", 3500);
              </script>
      <style>
      body{
          background-color: #ef7979;
          }
      .okimage{
          display:block;
          margin-left: auto;
          margin-right: auto;
          margin-top: 200px;
          height: 200px;
          width: 200px;
      }
      .texto{
          text-align: center;
          font: oblique bold 120% cursive;
          font-size: 200%;
          color: #FFF;
      }
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
      values ('3', '$nombre', '$apellido', '$correo', '$contraseña',0)")
      or die("Fallo la consulta </br>");
        echo '
        <html>
        <head>
                <meta charset="utf-8" />
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <title>Skaters - Status</title>
                <link rel="shortcut icon" href="'.$frontEndSketis.'Assets/icons/logo_header.png" />
                <script>
                        function r() { location.href="'.$frontEndSketis.'registro-almacenista.html"}
                        setTimeout ("r()", 5000);
                        </script>
                <style>
                body{
                    background-color: #00d27b;
                    }
                .okimage{
                    display:block;
                    margin-left: auto;
                    margin-right: auto;
                    margin-top: 200px;
                    height: 200px;
                    width: 200px;
                }
                .texto{
                    text-align: center;
                    font: oblique bold 120% cursive;
                    font-size: 200%;
                    color: #FFF;
                }
                </style>
        </head>
        <body>
            <tr>
                <td> <img class="okimage" src="'.$frontEndSketis.'Assets/icons/ok_icon.png"/> </td>
                <td><p class="texto">Has registrado a un almacenista de manera exitosa!
                </br> seras redireccionado automaticamente....</p></td>
            </tr>
        </body>
    </html>
        ';
    }
}
mysqli_close($conexion);
?>
