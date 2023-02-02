const form = document.getElementById("formulariob");
form.addEventListener("submit", function(event){
event.preventDefault();
let transaction = new FormData(form);
let search = transaction.get("codigo");


$.ajax({
     url: 'php/ventas_buscar.php',
    type:'POST',//get es para regresar valores del servidor POST: cuando mandamos valores al servidor
    data: {search},//mandamos el objeto con los datos a tasksearch
    success: function(response){
         console.log(response);//vemos el objeto json que nos regresa la consulta en PHP
        let tasks =JSON.parse(response);
        //let template='';
      console.log(JSON.parse(response));
      //document.getElementById("idnombre").innerHTML;//tasks.nombre;
       
       $('#idnombre').val(tasks.nombre);
       $('#existencia').val(tasks.cantidad);
       $('#precio_pub').val(tasks.precio_publico);
       $('#precio_pro').val(tasks.precio_proovedor);
       $('#fecha').val(tasks.fecha_registro);
    }
});


});

function guardarCompra(){
  alert("guardando");
  var codigo =$("#codigo").val();
  var compramos =$("#compramos").val();
  var tenemos =$("#existencia").val();
  var precio_pro =$("#precio_pro").val();
  var precio_pub =$("#precio_pub").val();

  let  ListaCompras = [];

  var Compra = {
    tenemos: tenemos,
    compramos: compramos,
    precio_pro: precio_pro,
    precio_pub: precio_pub,
    codigo: codigo 
};
ListaCompras.push(Compra);
  if(ListaCompras.length>0){
  
  var jsonString = JSON.stringify(ListaCompras);
//alert(jsonString);
$.ajax({
          url: "php/actualizar_prod_compra.php",
          type: "POST",          
          data: {data : jsonString},//capturo array     
          success: function(data){
console.log("vamos "+data); //nos muestra todos los mensajes para ver de php para acá
        }
});
}else{
  alert("No tenemos registro de ventas");
 
}

form.reset();

}

  //}
