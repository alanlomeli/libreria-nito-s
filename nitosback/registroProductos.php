<?php

include 'conexion.php';

$nombre = $_POST["nombre"];
$descripcion = $_POST["descripcion"];
$modelo = $_POST["modelo"];
$cantidad = $_POST["cantidad"];
$precio = $_POST["precio"];
$marca = $_POST["marca"];
$articulo=$_POST["articulo"];
$valFK;
$articuloFK;

$valoresPermitidos="abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ ";
$espacio=" ";
$validarEspacioN=substr($nombre,0,1);
  if($validarEspacioN===$espacio)
  {
    echo '<script src = "'.$frontEndSketis.'Assets/js/datosEN.js"> </script>';
    return false;
  }
$validarEspacioD=substr($descripcion,0,1);
  if($validarEspacioD===$espacio)
  {
    echo '<script src = "'.$frontEndSketis.'Assets/js/datosED.js"> </script>';
    return false;
  }
  $validarEspacioM=substr($modelo,0,1);
    if($validarEspacioM===$espacio)
    {
      echo '<script src = "'.$frontEndSketis.'Assets/js/datosEM.js"> </script>';
      return false;
    }
  if (strlen($nombre)<3)
  {
    echo '<script src = "'.$frontEndSketis.'Assets/js/datosMN.js"> </script>';
    return false;
  }
  if (strlen($descripcion)<3)
  {
    echo '<script src = "'.$frontEndSketis.'Assets/js/datosMD.js"> </script>';
    return false;
  }
  if (strlen($modelo)<3)
  {
    echo '<script src = "'.$frontEndSketis.'Assets/js/datosMM.js"> </script>';
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

$target_path = $frontEndSketis+"Assets/img/";
$target_path = $target_path . basename( $_FILES['imagenGuardada']['name']);

    if(move_uploaded_file($_FILES['imagenGuardada']['tmp_name'], $target_path)) {
        $linkImagen = basename( $_FILES['imagenGuardada']['name']);
    }
        else{
            echo "Ha ocurrido un error, trate de nuevo!";
        }

switch ($marca){
    case "Chapman & Hall":
        $valFK = 1;
        break;
    case "Bradbury and Evans":
        $valFK = 2;
        break;
           case "Grupo Editorial Tomo":
                $valFK = 3;
                break;
case "BackList":
                        $valFK = 4;
                        break;
case "Richard Bentley":
                        $valFK = 5;
                        break;
case "Espasa":
                        $valFK = 6;
                        break;
case "Alianza Editorial":
                        $valFK = 7;
                        break;
case "Diana":
                        $valFK = 8;
                        break;
case "DeBolsillo":
                        $valFK = 9;
                        break;

}

switch ($articulo){
    case "Llantas":
        $articuloFK = 1;
        break;
    case "Trucks":
        $articuloFK = 2;
        break;
    case "Tablas":
        $articuloFK = 3;
        break;
}

$consulta = mysqli_query($conexion,
"insert into producto (Marca_FK, Articulo_FK, Cantidad, Nombre, Foto, Modelo, Descripcion, Precio)
values ('$valFK', '$articuloFK', '$cantidad', '$nombre', '$linkImagen', '$modelo', '$descripcion', '$precio')")
or die ("Error en consulta");

echo '
<html>
    <head>
            <meta charset="utf-8" />
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <title>Skaters - ok</title>
            <link rel="shortcut icon" href="'.$frontEndSketis.'Assets/icons/logo_header.png" />
            <script>
                    function r() { location.href="'.$frontEndSketis.'skaters/registro-articulos.html"}
                    setTimeout ("r()", 3200);
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
            <td><p class="texto">Producto registrado con exito! - seras redireccionado automaticamente....</p></td>
        </tr>
    </body>
</html>
';

    mysqli_close($conexion);
?>
