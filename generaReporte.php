
<!DOCTYPE html>
<html lang="en">
    <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <title>Generación de reporte</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
    <div class="container">
    <div class="row">
    <div class="col-md-12">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="Menu.php">Menú</a>
</nav>
    </div>
    </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <h5 class="card-header">Generar Reporte:</h5>
                    <div class="card-body">
                    <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form  name="formAgregar" id="formAgregar"  method="POST" action="php/pdf.php">
                              <div class="form-group">
                                <input type="date" class="form-control" id="fechaInicia" name="fechaInicia"  placeholder="Fecha Inicia" require>
                             </div>
                              <div class="form-group">
                                <input type="date" class="form-control" id="fechaFin" name="fechaFin" placeholder="Fecha Fin" require>
                              </div>
                            <hr>
                            <button type="submit" class="btn btn-success btn-lg btn-block">Generarlo</button>      
                          </form>
                    </div>
                  </div>
            </div>
        </div>

    </div>

                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>   

    </body>
</html>