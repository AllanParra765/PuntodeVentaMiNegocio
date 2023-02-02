<?php
session_start();
if (isset($_SESSION['usuario'])) {
    if ($_SESSION['usuario']['tipo_usuario'] =='Administrador') {
        header('Location: Menu.php');
    }elseif ($_SESSION['usuario']['tipo_usuario'] =='Usuario') {
        header('Location: Menu.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Ingresar</title>
</head>
<body>
   
    <header>    
        <div class="container py-2">
                <div class="row py-1 aling-center">
                    <div class="col-3"></div>
                    <div class="col-md-7 py-9">
                        <div class="card aling-center  bg-primary mb-3">
                        <img src="img/login.png" class="mx-5 px-2 py-2" style=" max-height: 90%; max-width: 90%; ">
                            <div class="card-body">
                                <form id="formlg">
                                    <div class="form-group">
                                      <input type="text" class="form-control" id="Usuario"  pattern="[A-Za-z0-9_-]{1,15}" placeholder="Usuario" name="Usuario" required>
                                      </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                             <input type="password" class="form-control" id="Password" name="Password" pattern="[A-Za-z0-9_-]{1,15}" placeholder="Contraseña" required>
                                    
                                    <div class="input-group-append">
                                        <button id="show_password" class="btn btn-warning" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>
                                    </div>
                                </div>
                            </div>
                                   
                                    <button type="submit" class="btn btn-success btn-block  px-5 " id="botonlg" >Entrar</button>
                                   
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-2"></div>
<!--
                    <div class="col-6">
                     
                    </div>-->
                </div>
        </div>
    

    </header>

     
<script  type="text/javascript">
    // function buscar_producto(){
    //   var _nom =$("#codigo").val();
   //alert("si agarra "+_nom );
   
   
   const form = document.getElementById("formlg");
   form.addEventListener("submit", function(event){
   event.preventDefault();
   let transaction = new FormData(form);
   let user = transaction.get("Usuario");
   let pass = transaction.get("Password");
   //alert(user+" "+pass);
   
   $.ajax({
        url: 'php/sesion.php',
       type:'POST',//get es para regresar valores del servidor POST: cuando mandamos valores al servidor
       data: {user,pass},//mandamos el objeto con los datos a tasksearch
       success: function(response){
//        alert(response+" " +response[1]+response[2]+response[3]+response[4]+response[5]+response[6]+response[7]+response[8]+response[15]);
    
        var tipo=response[2]+response[3]+response[4]+response[5]+response[6]+response[7]+response[8];
   // alert(tipo);
         if (tipo === 'Adminis') {
                location.href ="Menu.php";
                //alert("Entre en admin");
           }else if(tipo == 'Usuario'){
            location.href ="Menu.php";
            //alert("Entre en usuario");
           }else{
             alert("ALGO ANDA MAL!! intenta nuevamente");
           }
       
    }
    
    });
       
   });
   
   


   </script>


<script type="text/javascript">
function mostrarPassword(){
		var cambio = document.getElementById("Password");
		if(cambio.type == "password"){
			cambio.type = "text";
			$('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
		}else{
			cambio.type = "password";
			$('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
		}
	} 
	
	$(document).ready(function () {
	//CheckBox mostrar contrase単a
	$('#ShowPassword').click(function () {
		$('#Password').attr('type', $(this).is(':checked') ? 'text' : 'password');
	});
});
</script>
 
 


<!-- Include the image-diff library -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>   
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</body>
</html>