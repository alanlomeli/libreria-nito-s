<?php
/*
Puse este php aqui porque si lo ponia en la direccion donde van todos no jalaba la navbar...
fin del comunicado.
*/
include '../../PHP/sketis/conexion.php';

$Var = $_POST['number'];
$idProducto;

$dameItems = mysqli_query($conexion, 'select producto.Producto_ID as id, articulo.Nombre as tipo, producto.Nombre as nombre, 
producto.Modelo as modelo, producto.Descripcion as descripcion, producto.Foto as foto, producto.Cantidad AS cantidad
 FROM articulo INNER JOIN producto 
ON producto.Articulo_FK = articulo.Articulo_ID;') or die ("Fallo la consulta");

$nfilas=mysqli_num_rows($dameItems);
$Fila=mysqli_fetch_array($dameItems);

if ($nfilas > 0){
    for ($i = 0; $i < $Var+1; $i++){
        $idProducto = $Fila['id'];
        $Fila=mysqli_fetch_array($dameItems);
    }
  }

  $consulta = mysqli_query($conexion, '
select producto.Nombre as nombre, producto.Descripcion as descripcion, producto.Modelo as modelo, producto.Cantidad as cantidad,
producto.Precio as precio, marca.Nombre as marca, articulo.Nombre as tipo
from producto
inner join marca on producto.Marca_FK = marca.Marca_ID
inner join articulo on producto.Articulo_FK = articulo.Articulo_ID
where Producto_ID = '.$idProducto.';
') or die ("fallo la consulta");

   $Fila=mysqli_fetch_array($consulta);

   $nombre = $Fila['nombre'];
   $descripcion = $Fila['descripcion'];
   $modelo = $Fila['modelo'];
   $cantidad = $Fila['cantidad'];
   $precio = $Fila['precio'];
   $marca = $Fila['marca'];
   $articulo = $Fila['tipo'];

    echo "
    
    <!DOCTYPE html>
<html>
<head>
  <meta charset='utf-8' />
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <title>Skaters - Editar Articulos</title>
  <link rel='shortcut icon' href='../Assets/icons/logo_header.png' />
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <script type='text/javascript' src='../Assets/js/barnav.js'></script>
  <!-- Bootstrap 3 -->
    <link rel='stylesheet' type='text/css' media='screen' href='../Assets/js/bootstrap/css/bootstrap.css' />
    <style>
        body{
            background-color: #FFF;
        }
        .panel-style{
            padding-top: 20px;
            margin-block-end: 20px;
        }
        .panel-title{
          text-align: center;
        }
        .btn-boton-crear,
        .btn-boton-crear:hover,
        .btn-boton-crear:active{
          background-color:#494949;
          color: white;
          border-radius: 10%;
        }
        .boton{
          text-align: right;
        }
        .panel-heading{
            background:  #494949;
            color: white;
        }
        .panel-body{
          text-align: left;
          border: #494949 3px solid ;
        }
        .imagen{
          text-align: left;
          height: 100px;
        }
        .btn-group{
          text-align: right;
          font-size: 15px;
          padding-top: 10px;
          padding-left: 83%;
        }
        .form-group{
         color: black;
        }

        input:valid {
        border: 1px solid green;
        box-shadow: 0 0 1px 1px green;
        }

        .bg-4 {
        padding-top: 10px;
        background-color: #343434;
        color: #ffffff;
        }

    </style>
</head>
<body>
<div id='insertar-barra'></div>

    <div class='container'>
        <div class='col-md-8 col-md-offset-2 panel-style'>
                  <div class='panel-heading'>
                        <h3 class='panel-title'>
                            <strong>
                                Editar Articulo
                            </strong>
                        </h3>
                  </div>
                  <div class='panel-body'>
                        <form enctype='multipart/form-data'
                        action='/Skate/PHP/sketis/editarProducto.php' method='post'>

                            <div class = 'form-group'>
                            <label for='id'>ID del producto: </label>
                            <input for='txt_id' name='id' style='color:#FF0000'; value = ".$idProducto.">
                            </div>
                            <div class='form-group'>
                                    <label for='nombre'>Nombre*</label>
                                    </br>
                                    <label  style='color:#A6A6A6';>".$nombre."</label>
                                </div>
                                <div class='form-group'>
                                    <label for='descripcion'>Descripcion*</label>
                                    </br>
                                    <label style='color:#A6A6A6';>".$descripcion."</label>
                                </div>
                                <div class='form-group'>
                                    <label for='modelo'>Modelo*</label>
                                    </br>
                                    <label style='color:#A6A6A6';>".$modelo."</label>
                                </div>
                                <div class='form-group'>
                                    <label for='cantidad'>Cantidad*</label>
                                    <input min= '1' max='99999' type='number' name='cantidad' id='cantidad' placeholder='Cantidad de productos a agregar' class='form-control' required='required'
                                    value=".$cantidad.">
                                </div>
                                <div class='form-group'>
                                    <label for='precio'>Precio*</label>
                                    <input min= '1' max='99999' type='number' name='precio' id='precio' placeholder='Precio (en MXN)' class='form-control' required='required'
                                    value = ".$precio.">
                                </div>

                                <div class='form-group'>
                                  <label >Seleccionar Marca*</label>
                                <select class='form-control' name ='marca' id='marca' required>
                                    <option>".$marca."</option>
                                    <option>Antifashion</option>
                                    <option>Santa Cruz</option>
                                    <option>Vans</option>
                                    <option>Spitfire</option>
                                    <option>Independent</option>
                                    <option>Dexlix</option>
                                    <option>Plan B</option>
                                    <option>Deathwish</option>
                                    <option>Hysteria</option>
                                    <option>Krux</option>
                                    <option>Vulkan</option>
                                    <option>VEnture</option>
                                    <option>Thunder</option>
                                  </select>
                                  </div>

                                  <div class='form-group'>
                                    <label >Seleccionar Articulo*</label>
                                  <select class='form-control' name='articulo' id='articulo' required>
                                      <option>".$articulo."</option>>
                                      <option>Llantas</option>
                                      <option>Trucks</option>
                                      <option>Tablas</option>
                                    </select>
                                    </div>

                                <div class='form-group'>

                                      <input type='file' name='imagenGuardada' type='file' accept='image/png, .jpeg, .jpg, image/gif'/>

                                </div>

                                <div class='form-group'>
                                    <div class = 'btn-group'>
                                      <input type = 'submit' value = 'Editar' />
                                    </div>
                                </div>
                                  
                        </form>
                  </div>
            </div>

        </div>

        <footer class='container-fluid bg-4 text-center'>
          <p>© Skaters 2019 - Proyecto hecho por <a href='https://www.ceti.mx' target='_blank'>CETI</a></p>
        </footer>
</body>
<script>

</script>

</body>
</html>

    
    ";

    mysqli_close($conexion);
    ?>