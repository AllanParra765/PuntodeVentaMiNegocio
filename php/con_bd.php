
<?php
//$conex = mysqli_connect("localhost","root","","inventario_negocios");  

session_start();

$servername = "localhost";
$database = "bd_tienda";
$username = "root";
$password = "root";
// Create connection
$mysqli =  new mysqli($servername, $username, $password, $database);
// Check connection
if (!$mysqli) {
    die("Error en la conexion : " . mysqli_connect_error());
}
/*
echo "Conectado";
mysqli_close($mysqli);
*/
?>