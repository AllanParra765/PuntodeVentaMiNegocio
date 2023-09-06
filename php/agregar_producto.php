<?php
include("con");
$Nombreproducto =  $_POST['NombrepProducto'];
$cantidadProducto =  $_POST['cantidadProducto'];
$precioProvedor =  $_POST['precioProvedor'];
$precioPublico =  $_POST['precioPublico'];
$fechaRegistro =  NOW();//$_POST['fechaRegistro'];   date("Y-m-d);
$codigo =  $_POST['codigo'];





//////cargar Imagen

// Recibo los datos de la imagen
$nombre_img = "Imagen_Prueba";


$j= 2;//(int) $_SESSION['inicio'];
echo "$j";

if (isset($_POST['codigo'])) {
    //echo  " animo ". $_POST['name'];
$consulta = " INSERT INTO `tbProducto` (`id_producto`, `fecha_ingreso`, `nombre_producto`, `cantidad`, `precio_proveedor`, `precio_publico`, `imagenProducto`, `fk_idUsuario`, `id_producto_codigo`) VALUES (NULL, '2023-05-22', 'Alitas4', '12', '10', '20', 'imagenProducto', '1', '1234567890102');";
    //$consulta= "INSERT INTO tbProducto (`fecha_ingreso`, `nombre_producto`, `cantidad`, `precio_proveedor`, `precio_publico`, `imagenProducto`, `fk_idUsuario`, `id_producto_codigo`)
      //          VALUES ('$fechaRegistro', '$Nombreproducto', '$cantidadProducto', '$precioProvedor', '$precioPublico',null, 2,'$codigo')";
    //"INSERT INTO task (namebd, descriptionbd) VALUES ('$name','$description')";
    //INSERT INTO `tbProducto`(`fecha_ingreso`, `nombre_producto`, `cantidad`, `precio_proveedor`, `precio_publico`, `imagenProducto`, `fk_idUsuario`, `id_producto_codigo`) VALUES ('2022-02-12','lonches','10','20.90','22.90','no tenemos','1','123456789098')
    $resultado = mysqli_query($mysqli,$consulta);
    if(!$resultado){
        die('Algo anda mal XD');
    }
    
}

header("Location:" .'../buscar.php');
die();
$mysqli->close();
?>