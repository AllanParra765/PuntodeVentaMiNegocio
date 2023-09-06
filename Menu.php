<?php
require_once ("vistas/partials/header.php");
?>
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
        <img src="icons/comprar.png" class="btn btn-outline-warning" alt="x" style=" max-height: 80px; max-width: 80px;" value="Algo"/>  
           <p>Registrar/<br>Comprar Producto</p>        
        <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="ventas.php">
        <img src="icons/buscar-producto.png" class="btn btn-outline-warning" alt="x" style=" max-height: 80px; max-width: 80px;" value="Algo"/>             
        <p>Vender Producto</p> </a>
      </li>
      
       <li class="nav-item">
        <a class="nav-link" href="generaReporte.php">
        <img src="icons/reportes.png" class="btn btn-outline-warning" alt="x" style=" max-height: 80px; max-width: 80px;" value="Algo"/>             
        Reporte Venta</a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="php/salir.php">
        <img src="icons/cerrar-sesion.png" class="btn btn-outline-warning" alt="x" style=" max-height: 80px; max-width: 80px;" value="Algo"/>                      
        Salir</a>
      </li>
    </ul>
  </div>
</nav>

      </div>
      </div>
      </div>


      <?php
require_once ("vistas/partials/footer.php");
?>