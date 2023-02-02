<?php

include("con_bd.php");

$usuario=  $_POST['search'];
//$password =  mysqli_real_escape_string($mysqli, $_POST['pass']);

    if (isset($_POST['search'])) {
       
 
        $query = "SELECT nombre,usuario,tipo_usuario FROM tb_loginusuario WHERE usuario='$usuario'";//"SELECT tipo_usuario FROM 'tb_loginusuario' WHERE 'usuario' = 'usuario' and 'id_usuario'= 1";
        $result = mysqli_query($mysqli, $query);
        if(!$result){
            die( 'Query Error'. mysqli_error($mysqli));
        }elseif($result->num_rows == 1){

            $json = array();
            while($row = mysqli_fetch_array($result)){
                $json[] = array(
                    'nombre' => $row['nombre'], 
                    'usuario' => $row['usuario'],
                    'tipo_usuario' => $row['tipo_usuario']
                );
            }
            $jsonstring = json_encode($json);
            echo $jsonstring;
        }
    else{
        echo json_encode(array('error'=> true));
    }
        }
      
    $mysqli->close();


?>