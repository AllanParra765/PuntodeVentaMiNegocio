<?php
include("con_bd.php");
$Nombreproducto =  $_POST['Nombreproducto'];
$cantidadProducto =  $_POST['cantidadProducto'];
//$precioProvedor =  $_POST['precioProvedor'];
$precioPublico =  $_POST['precioPublico'];
//$fechaRegistro =  $_POST['fechaRegistro'];
$codigo =  $_POST['codigo'];

//////cargar Imagen

// Recibo los datos de la imagen
$nombre_img = $_FILES['imagen']['name'];
$tipo = $_FILES['imagen']['type'];
$tamano = $_FILES['imagen']['size'];
$ruta = $_FILES['imagen']['tmp_name'];
$destino = "Desktop/imagenPHP/".$nombre_img;
//Si existe imagen y tiene un tamaño correcto

if ((copy("C:/Users/Allan P/Desktop/productos/".$nombre_img,"C:/xampp/htdocs/codigoBarras/img/".$nombre_img)) && ($nombre_img == !NULL) && ($_FILES['imagen']['size'] = 200000))
{
   //indicamos los formatos que permitimos subir a nuestro servidor
   if (($_FILES["imagen"]["type"] == "image/gif")
   || ($_FILES["imagen"]["type"] == "image/jpeg")
   || ($_FILES["imagen"]["type"] == "image/jpg")
   || ($_FILES["imagen"]["type"] == "image/png"))
   {
      // Ruta donde se guardarán las imágenes que subamos
      $directorio = 'C:/Users/Allan P/Desktop/imagenPHP/'; //$_SERVER['DOCUMENT_ROOT'].'/C:/Users/Allan P/Desktop/imagenPHP/';
      // Muevo la imagen desde el directorio temporal a nuestra ruta indicada anteriormente
      move_uploaded_file($_FILES['imagen']['tmp_name'],$directorio.$nombre_img);
    }
    else
    {
       //si no cumple con el formato
       echo "No se puede subir una imagen con ese formato ";
    }
}
else
{
   //si existe la variable pero se pasa del tamaño permitido
   if($nombre_img == !NULL) echo "La imagen es demasiado grande ";
}


//////////////////fin de la carga de imagen

$id= $_SESSION['inicio'];
$j= (int) $id; 
///echo "$j";

if (isset($_POST['codigo'])) {
    //echo  " animo ". $_POST['name'];
    $consulta= "INSERT INTO tbProducto (`id_producto`, `fecha_ingreso`, `nombre_producto`, `cantidad`, `precio_proveedor`, `precio_publico`,`imagenProducto`, `fk_idUsuario`)
                VALUES ('$codigo', '$fechaRegistro', '$Nombreproducto', '$cantidadProducto', '$precioProvedor', '$precioPublico','$nombre_img', '$j')";
    //"INSERT INTO task (namebd, descriptionbd) VALUES ('$name','$description')";
    $resultado = mysqli_query($mysqli,$consulta);
    if(!$resultado){
        die('Query failed');
    }
    
}
      echo'<script type="text/javascript"> alert("Se agrego producto correctamente");
window.location.href="../buscar.php";</script>';
//header("Location:" .'../buscar.php');
die();
$mysqli->close();
?>