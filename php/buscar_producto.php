<?php
include("con_bd.php");
//echo "entre en buscar";

$search = $_POST['search'];

if(!empty($_POST['search'])){
$query = "SELECT * FROM tbProducto WHERE id_producto LIKE '$search%' or nombre_producto LIKE '$search%'"; 
$result = mysqli_query($mysqli, $query);
if(!$result){
    die( 'Query Error'. mysqli_error($mysqli));
}
$json = array();
while($row = mysqli_fetch_array($result)){
    $json[] = array(
        'nombre' => $row['nombre_producto'], 
        'precio_publico' => $row['precio_publico'],
        'cantidad' => $row['cantidad'],
        'id_producto' => $row['id_producto'],
        'imagenProducto' => $row['imagenProducto']
    );
}
$jsonstring = json_encode($json);
echo $jsonstring;
}



?>