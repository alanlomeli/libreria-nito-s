<?php
    //$server="localhost";
    require 'descontararticulos.php';
    $_SESSION["reset"] = 0;
    require 'carro.php';
      echo  "<script type='text/javascript'>";
      echo "alert('Compra realizada con éxito');";
    //  echo "opener.location.reload();";
      echo "window.close();";
      echo "</script>";
    ?>
