<?php
session_start();
if (isset($_SESSION['usuario'])) {
  if ($_SESSION['usuario']['tipo_usuario'] =='Usuario') {
    header("Location: ventas.php");
  }else{
    if ($_SESSION['usuario']['tipo_usuario']=='Adminis') {
        header('Location: Menu.php');
    }
  }
}else{
  header("Location: index.php");
  die();
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">   
    <title>Menú</title>
</head>
<body>