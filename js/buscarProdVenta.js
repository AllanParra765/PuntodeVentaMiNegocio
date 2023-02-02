$(function(e) {
    $('#task-result').hide();
//console.log("JQuery al 100");
$('#search').keyup(function(e){//escuchamos lo que se escribe cada ve que se hace clic
    e.preventDefault();//nos permite cancelar que se recargue la pagina
    if($('#search').val()){

        let search = $('#search').val(); //vemos el valor lo guardamos y lo podemos utilizar
//console.log(search);//vemos que aparece cada vez que damos clic en consola
$.ajax({
     url: 'php/buscar_producto.php',
    type:'POST',//get es para regresar valores del servidor POST: cuando mandamos valores al servidor
    data: {search},//mandamos el objeto con los datos a tasksearch
    success: function(response){
          // console.log(response+" que tenemos");//vemos el objeto json que nos regresa la consulta en PHP
        let tasks =JSON.parse(response);
       // alert(tasks + "llego");
        let template='';
        //console(tasks.nombre+" que tiene");
//console(tasks.nombre_producto + " tenemos");
// va antes del <hr> //<img class="card-img-top" src="img/${task.imagenProducto}" alt="${task.imagenProducto}"/>
        tasks.forEach(task =>  {
            template += 
            `
        <div class="col-12">
            <div class="card my-3">
                <div class="card-body text-center" >
                    <p class="card-text text-left" id='nombre' name="${task.nombre}"><strong>Nombre:</strong> ${task.nombre}</p>
                    <hr>
                    <p class="card-text text-left"><strong>Existencia:</strong> ${task.cantidad} Pz.</p>
                    <hr>
                    <p class="card-text text-left" id="precio" name="${task.precio_publico}"><strong>Precio:$</strong> ${task.precio_publico}</p>
                    <hr>
                    <p class="card-text text-left"><strong>Código:</strong>${task.id_producto}</p>
                    <hr>
                    <p><strong>Vender:</strong></p>
                      <p>  <input type="number" min=0 id="vendemos" class="form-control" aria-describedby="emailHelp" value="0" placeholder="vendemos " required>
                      <p></p>
                    <button type="submit" class="btn btn-info btn-lg btn-block" id="${task.id_producto}" name="${task.cantidad}" onclick="vamos(this)">Vender</button> 
            </p>
                </div>
            </div>
        </div>
        <br>`
        

        });

        $('#container').html(template);
        $('#task-result').show();
    }
});

    }

    $('#task-result').hide();
});
});