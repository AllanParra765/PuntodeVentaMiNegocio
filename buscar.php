<?php
session_start();
if (isset($_SESSION['usuario'])) {
  if ($_SESSION['usuario']['tipo_usuario']!='Usuario') {
    //header("Location: ventas.php");
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
    <title>Buscar Producto</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  
</head>
<body>

<div class="container">
  
    <div class="row">
      <div class="col-md-12">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <a class="navbar-brand" href="Menu.php">Menú</a>
            <form class="form-inline" name="formulario" id="formulario">
              <input class="form-control mr-sm-2" type="search" name="search" id="search" placeholder="Código Producto">
                  <!-- <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Escanear Código</button>-->
            </form>
        </nav>
      </div>

      <div class="col-12" id="task-result">
              <div class="container-fluid">
                <div class="row" id="container">

                </div>
              </div>
            </div>

            <div class="col-md-12">
            <h3 class="text-center">Registrar Producto:</h3>
                <div class="card">
                    <div class="card-body">
                        <form  name="formAgregar" id="formAgregar"  method="post" enctype="multipart/form-data" action="php/agregar_producto.php">
                            <div class="form-group">
                            <label for="exampleInputEmail1">Nombre Producto:</label>
                              <input type="text" class="form-control" name="Nombreproducto" id="Nombreproducto"  placeholder=""required>
                            </div>
                            <div class="form-group">
                            <label for="exampleInputEmail1">Cantidad de piezas:</label>
                                <input type="number" class="form-control" name="cantidadProducto" id="cantidadProducto" placeholder="" required>
                              </div>
                              <!--
                              <div class="form-group">
                                <input type="text" class="form-control" name="precioProvedor" id="precioProvedor"placeholder="Precio Provedor" require>
                              </div>
                              -->
                              <div class="form-group">
                             
                              <label for="exampleInputEmail1">Precio Producto</label>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text">$</div>
        </div>
        <input type="text" class="form-control" name="precioPublico" id="precioPublico"value="00.00" required>
        </div>
   

                             </div>
                              <!--
                              <div class="form-group">
                                <input type="date" class="form-control" id="fechaRegistro" name="fechaRegistro"  placeholder="Fecha Registro" require>
                              </div>
                              -->
                            <div class="form-group">
                            <label for="exampleInputEmail1">Código</label>
                              <input type="text" class="form-control" name="codigo" id="codigo" placeholder="" required/>
                              <!--
                                    <div class="mb-3">
                                      <label for="formFile" class="form-label">Cargar imagen del Producto</label>
                                      <input class="form-control" type="file" id="imagen" name="imagen">
                                    </div>
                                      -->                             
                              <hr>
                             
                              <div id="scanner-container"></div>
                            <button type="submit" class="btn btn-success btn-lg btn-block">Guardar</button> 
                               </div>
                               <input type="button" class="form-control btn btn-secondary  btn-lg btn-block" id="btn" value="Escanear Código" require/>     
                          </form>
                    </div>
                  </div>
            </div>
    



    </div>
</div>
    
<script>
function vamos(comp) {
    //alert("entre");
  let  ListaCompras = [];
  let  nuevas= $('#compramos').val();
  let _cod = comp.id;
  let _antesntes = comp.name;
  let  _precio= $('#cantidad').val();
  //let otro = comp.name;
  //console.log(id);

 // alert(_antesntes+" vamos "+_cod+" "+nuevas+" "+_precio);

var Compra = {
    piezas: nuevas,
    precio: _precio,
    codigo: _cod,
    piezasAntes:_antesntes
};

ListaCompras.push(Compra);

var jsonString = JSON.stringify(ListaCompras);
  
  $.ajax({
          url: "php/actualizar_prod_compra.php",
          type: "POST",          
          data: {data : jsonString},//capturo array     
          success: function(data){
         alert("Se registro la operacion"); //nos muestra todos los mensajes para ver de php para acá
}
});

}
</script>




    <!-- Include the image-diff library -->
 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
 <script src="js/escaner.js"></script>
 <script src="https://cdn.rawgit.com/serratus/quaggaJS/0420d5e0/dist/quagga.min.js"></script>
 <script src="js/buscarbtn.js"></script>
 <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>   
 
</body>
</html>