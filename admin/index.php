<?php

if($_POST){
    header('Location:inicio.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <div class="row">

            <div class="col-md-3">

            </div>

            <div class="col-md-6">
                <br>
                <br>
                <div class="card">
                    <div class="card-header">
                        Iniciar Sesión
                    </div>
                    <div class="card-body">

                        <form action="index.php" method="post">
                            <div class="form-group">
                                <input type="text" name="usuario" class="form-control" placeholder="Ingresa tu usuario" required>
                            </div>

                            <div class="form-group">
                                <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Entrar a bodega</button>
                        </form>

                    </div>
                </div>
            </div>

            <div class="col-md-3">
                
            </div>

        </div>
    </div>

</body>

</html>