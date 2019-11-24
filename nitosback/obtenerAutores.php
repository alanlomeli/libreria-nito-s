<?php
include 'conexion.php';
$dameItems = mysqli_query($conexion, 'SELECT
articulo.Nombre AS nombre,
articulo.Descripcion AS descripcion,
articulo.Foto AS foto
FROM
articulo
;') or die ("Fallo la consulta");
$nfilas=mysqli_num_rows($dameItems);
$Fila=mysqli_fetch_array($dameItems);

if ($nfilas > 0){
    print '[';
    for ($i = 0; $i < $nfilas; $i++){

        $nombre = $Fila['nombre'];
        $descripcion = $Fila['descripcion'];
        $foto = $Fila['foto'];
        print '{';
        print '"Nombre":"'.$nombre.'",';
        print '"Descripcion":"'.$descripcion.'",';
        print '"Foto":"'.$foto.'"';
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