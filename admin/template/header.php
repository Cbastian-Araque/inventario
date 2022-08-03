<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Administrador</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<body>

    <?php $url = "http://" . $_SERVER['HTTP_HOST'] . "/bicicleteria" ?>
    <nav class="navbar navbar-expand navbar-light bg-light">
        <div class="nav navbar-nav">
            <a class="nav-item nav-link active" href="#">Gestionar Bodega<span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="<?php echo $url . '/admin/inicio.php/'  ?>">Inicio</a>
            <a class="nav-item nav-link" href="<?php echo $url . '/admin/seccion/productos.php/'; ?>">Administrar productos</a>
            <a class="nav-item nav-link" href="<?php echo $url . '/admin/seccion/cerrar.php/'; ?>">Cerrar sesión</a>
            <a class="nav-item nav-link" href="<?php echo $url; ?>">Ver sitio web</a>
        </div>
    </nav>

    <div class="container">
        <br>
        <div class="row">