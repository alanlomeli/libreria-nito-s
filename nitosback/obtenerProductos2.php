<?php
    include 'conexion.php';
    $dameItems = mysqli_query($conexion, 'SELECT
producto.Producto_ID AS id,
articulo.Nombre AS tipo,
producto.Nombre AS nombre,
producto.Modelo AS modelo,
producto.Descripcion AS descripcion,
producto.Foto AS foto,
producto.Cantidad AS cantidad,
producto.Precio AS precio,
producto.Foto AS foto,
marca.Nombre AS marca
FROM
articulo
INNER JOIN producto ON producto.Articulo_FK = articulo.Articulo_ID
INNER JOIN marca ON producto.Marca_FK = marca.Marca_ID
WHERE articulo.Articulo_ID = 2
;') or die ("Fallo la consulta");
    $nfilas=mysqli_num_rows($dameItems);
    $Fila=mysqli_fetch_array($dameItems);
    if ($nfilas > 0){
        print '[';
        for ($i = 0; $i < $nfilas; $i++){
            $id = $Fila['id'];
            $nombre = $Fila['nombre'];
            $descripcion = $Fila['descripcion'];
            $modelo = $Fila['modelo'];
            $cantidad = $Fila['cantidad'];
            $precio = $Fila['precio'];
            $marca = $Fila['marca'];
            $articulo = $Fila['tipo'];
            $foto = $Fila['foto'];
            print '{';
            print '"ID":"'.$id.'",';
            print '"Nombre":"'.$nombre.'",';
            print '"Descripcion":"'.$descripcion.'",';
            print '"Modelo":"'.$modelo.'",';
            print '"Cantidad":"'.$cantidad.'",';
            print '"Precio":"'.$precio.'",';
            print '"Marca":"'.$marca.'",';
            print '"Foto":"'.$foto.'",';
            print '"Articulo":"'.$articulo.'"';
            if($i==$nfilas-1){
                print "}";
            }else{
                print "},";
            }
            $Fila=mysqli_fetch_array($dameItems);
        }
        print "]";
    }
    mysqli_close($conexion);
?>
