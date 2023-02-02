<?php
include("con_bd.php");
$data =  json_decode(stripslashes($_POST['data'] ));
print_r("algo");

  foreach($data as $fila){
   //  echo $fila->nombre;
    // echo $fila->piezas;
    // echo $fila->precio;
     //echo $fila->codigo;
     $precio=$fila->precio;

   //echo  " animo ". $_POST['name'];
   
   
   $productonuevo = ($fila->piezas)+($fila->piezasAntes);
   $consulta= "UPDATE `tbProducto` SET `cantidad` = '$productonuevo', `precio_publico` = '$precio' WHERE `id_producto` = '$fila->codigo' ";
   $resultado = mysqli_query($mysqli,$consulta);
   if(!$resultado){
       die('Query failed');
   }
   echo "Listo el insert ";
   
   
   
  }
die();
$mysqli->close();
?>