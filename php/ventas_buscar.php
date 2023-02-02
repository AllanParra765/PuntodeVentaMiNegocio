<?php

include("con_bd.php");

$buscar= $_POST["codigo"];
//echo "Hola buscar " . $buscar; 
print_r("Que paso aquí");
if (isset($_POST['codigo'])) {


$consulta= "SELECT * FROM tbProducto WHERE id_producto='otro'";
$resultado = mysqli_query($mysqli, $consulta);
if(!$resultado){
    die("algo anda mal en el Select");
}
$json = array();
    while($row = mysqli_fetch_array($resultado)) {
        $json [] = array (
        'nombre_producto' => $row['nombre_producto'],
        'precio_publico' => $row['precio_publico'],
        'id_producto' => $row['id_producto']

        );
}

$jsonstring = json_encode($json[0]);
echo $jsonstring;

}
//die();
$mysqli->close();
?>