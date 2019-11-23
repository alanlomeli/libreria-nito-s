<?php
    include 'conexion.php';
    $Var = $_POST['number'];
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
    Nombre: $nombre </br>
    Descripcion: $descripcion </br>
    Modelo: $modelo </br>
    Cantidad: $cantidad </br>
    Precio: $precio </br>
    Marca: $marca </br>
    Articulo: $articulo </br>
    ";
    mysqli_close($conexion);
?>