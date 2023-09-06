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
<head><meta charset="UTF-8">
    
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
                  <!-- <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Escanear C車digo</button>-->
            </form>
            <a class="navbar-brand" href="php/salir.php">Cerrar sesión</a>
        </nav>  
      </div>
           
                <div class="col-md-8">
                        <table id="tabla" class="table table-bordered table-responsive">
                            <thead>
                                  <tr>
                                <td colspan="4" id="fecha">Fecha:</td>
                                <td colspan="2" class="table-success" id="total">Total</td>
                              </tr>
                                <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Piezas</th>
                                <th scope="col">Total</th>
                                <th>Quitar</th>
                              </tr>
                            </thead>
                            <tbody id="tablita">
                             
                             
                            </tbody>
                          </table>                        

                  <hr>
                  <button type="submit" onclick="guardarDatos();" class="btn btn-primary btn-lg btn-block aling-center btn-success my-2">Cobrar</button>                 
            
                    
                </div>
                 <div class="col-md-4" id="task-result">
              <div class="container">
                <div class="row" id="container">

                </div>
              </div>
            </div>
            
            
            
     </div>          



 
</div>
    

  
<script type="text/javascript">
 var total=0;
var id=0;
let  ListaCompras = [];
function vamos(llegada) {
//alert("entre");
  
  let  vendemos= $('#vendemos').val();
  let _cod = llegada.id;
  let _tenemosexistencias = llegada.name;
  let  _precio=$("#precio").attr('name');
  let  _nom=$("#nombre").attr('name');
  var precio =(_precio*vendemos);
    var existencias=_tenemosexistencias-vendemos;
  if(parseInt(vendemos)<=parseInt(_tenemosexistencias)){
 alert(vendemos+" vendemos "+_tenemosexistencias+" tenemos "); 


 
var Compra = {
    nombre: _nom,
    piezas: vendemos,
    precio: _precio,
    codigo: _cod,
    existencias:existencias
};
ListaCompras.push(Compra);
 var fila="<tr id='"+id+"'><td>"+_nom+"</td><td>"+"$ "+_precio+"</td><td>"+vendemos+" pz"+"</td><td>"+"$ "+precio+"</td><td><button id='"+id+"' name='"+precio+"' onclick='QuitarTabla(this.id, this.name)'; class='btn btn-warning'>Quitar</button></td></tr>";
 
 id++;
    
total +=precio; 
document.getElementById("tablita").innerHTML += fila;

document.getElementById("total").innerHTML = "$"+total;
var f = new Date();
document.getElementById("fecha").innerHTML = (f.getDate() + "/" + (f.getMonth() +1) + "/" + f.getFullYear());

 form.reset();
 
  }else{
      alert("no puedes vender más de lo que tienes");
  }
  
  
}
function QuitarTabla(id,precioProducto){
  //var preciotabla = $("#a").val();

 // alert("precio tabla "+ name);
$('#'+id).remove();
total=total-precioProducto;
document.getElementById("total").innerHTML = total;
let pos = ListaCompras.indexOf(ListaCompras.id);
//console.log(pos);
ListaCompras.splice(pos,1);

//ListaCompras.forEach(element => console.log(element));
}


function guardarDatos(){
//alert("probando");
//ListaCompras.forEach(element => console.log(element));
if(ListaCompras.length>0){
  
  var jsonString = JSON.stringify(ListaCompras);
  
  $.ajax({
          url: "php/ventas_agregar.php",
          type: "POST",          
          data: {data : jsonString},//capturo array     
          success: function(data){
alert("Se registro la venta"); //nos muestra todos los mensajes para ver de php para acá
}
});
}else{
  alert("No tenemos registro de ventas");
 
}

$("#tablita tr").remove(); 
ListaCompras=[];
total=0;
document.getElementById("total").innerHTML = total;
var f = new Date();
document.getElementById("fecha").innerHTML = (f.getDate() + "/" + (f.getMonth() +1) + "/" + f.getFullYear());



}
</script>

 

    <!-- Include the image-diff library -->
 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
 <script src="js/escaner.js"></script>
 <script src="https://cdn.rawgit.com/serratus/quaggaJS/0420d5e0/dist/quagga.min.js"></script>
 <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>   
 <script src="js/buscarProdVenta.js"></script>
</body>
</html>