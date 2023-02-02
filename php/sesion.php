<?php

include("con_bd.php");

$usuario= mysqli_real_escape_string($mysqli, $_POST['user']);
$password =  mysqli_real_escape_string($mysqli, $_POST['pass']);

if (isset($_POST['user'])) {
    if (isset($_POST['pass'])) {
       
 
        $query = "SELECT tipo_usuario,id_usuario FROM tb_loginUsuario WHERE usuario='$usuario' AND contrasena = sha1('$password')";//"SELECT tipo_usuario FROM 'tb_loginusuario' WHERE 'usuario' = 'usuario' and 'id_usuario'= 1";
        $result = mysqli_query($mysqli, $query);
        if(!$result){
            die( 'Query Error'. mysqli_error($mysqli));
        }elseif($result->num_rows == 1){




$datos = $result->fetch_assoc();
//array('error'=> false, 'Tipo' =>$datos['Tipo_Usuario'])
$_SESSION['usuario']=$datos;
$_SESSION['inicio']=$datos;
echo json_encode($datos['tipo_usuario']);
echo json_encode($datos['id_usuario']);
        }
    else{
        echo json_encode(array('error'=> true));
    }
        }
        die();
    $mysqli->close();
}

?>