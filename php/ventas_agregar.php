<?php
include("con_bd.php");
$data = json_decode(stripslashes($_POST['data'] ));
$id= $_SESSION['inicio'];
$j= (int) $id; 
$fecha= date('Y-m-d H:i:s');
//header("Location: ../index.php");
foreach($data as $fila){
   //  echo $fila->nombre;
    // echo $fila->piezas;
    // echo $fila->precio;
     //echo $fila->codigo;


$existencias='$fila->existencias'-'$fila->piezas';
        //echo  " animo ". $_POST['name'];
       $consulta2= "UPDATE `tbProducto` SET `cantidad` = '$fila->existencias' WHERE `id_producto` = '$fila->codigo' and  `fk_idUsuario`= '$j'";

        //echo  " animo ". $_POST['name'];
        $consulta= "INSERT INTO tb_Ventas (`cantidad_venta`,`fecha_venta`, `fk_idProducto`, `fk_idUsuario`) 
        VALUES ('$fila->piezas','$fecha','$fila->codigo','$j' )";
        //"INSERT INTO task (namebd, descriptionbd) VALUES ('$name','$description')";
        $resultado = mysqli_query($mysqli,$consulta);
        $resultado2 = mysqli_query($mysqli,$consulta2);
        if(!$resultado){
            die('Query failed');
        }
  }
//die();
  echo "Se registro la Compra.";

  //die();
  $mysqli->close();
?>