<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200;500;700;800&display=swap" rel="stylesheet" />
  <title>Admin Bicicletería</title>
  <link rel="stylesheet" href="styles/main.css" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous" />
  <link rel="stylesheet" href="styles\normalize.css" />
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