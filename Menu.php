<?php
session_start();
if (isset($_SESSION['usuario'])) {
  if ($_SESSION['usuario']['tipo_usuario']!='Administrador') {
    header("Location: Agregar.php");
  }else{
    if ($_SESSION['usuario']['tipo_usuario'] =='Usuario') {
        header('Location: agregar.php');
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
    <header>    

      <div class="container">
      <div class="row">
      <div class="col-12">
      
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">
  Menú</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="buscar.php">
        <img src="icons/comprar.png" class="btn btn-outline-warning" alt="x" style=" max-height: 27%; max-width: 27%;" value="Algo"/>             
        Registrar/Comprar Producto<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="ventas.php">
        <img src="icons/buscar-producto.png" class="btn btn-outline-warning" alt="x" style=" max-height: 27%; max-width: 27%;" value="Algo"/>             
        Vender Producto</a>
      </li>
      <!--
       <li class="nav-item">
        <a class="nav-link" href="generaReporte.php">
        <img src="icons/reportes.png" class="btn btn-outline-warning" alt="x" style=" max-height: 27%; max-width: 27%;" value="Algo"/>             
        Reporte Venta</a>
      </li>
      -->
      <li class="nav-item">
        <a class="nav-link" href="php/salir.php">
        <img src="icons/cerrar-sesion.png" class="btn btn-outline-warning" alt="x" style=" max-height: 27%; max-width: 27%;" value="Algo"/>                      
        Salir</a>
      </li>
    </ul>
  </div>
</nav>

      </div>
      </div>
      </div>

<!-- Include the image-diff library -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>   

</body>
</html>




