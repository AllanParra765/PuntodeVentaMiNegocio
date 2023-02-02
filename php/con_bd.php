
<?php
//$conex = mysqli_connect("localhost","root","","inventario_negocios");  

session_start();

$servername = "mx58.hostgator.mx";
$database = "mnegocio_bd_tienda";
$username = "mnegocio";
$password = "53Hjv]+TK4yF8f";
// Create connection
$mysqli =  new mysqli($servername, $username, $password, $database);
// Check connection
if (!$mysqli) {
    die("Error en la conexion : " . mysqli_connect_error());
}
//echo "Conectado";
//mysqli_close($mysqli);



?>