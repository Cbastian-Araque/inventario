<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bicicletas Millan</title>
    <link rel="shortcut icon" href="media\iconobicicleta.ico" type="icono">
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <!-- Hoja de estilos (aplicando Preprocesador Sass) -->
    <link rel="stylesheet" href="estilos\1estilos.css">
    <!-- importación de fuentes de google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300;600&display=swap" rel="stylesheet">
</head>

<body>
    <?php $url = "http://" . $_SERVER['HTTP_HOST'] . "/bicicleteria" ?>
    <header class="head">
        <nav class="navbar navbar-expand navbar-dark bg-dark head--menu">
            <div class="head--logo">
                <img src="media/logo-millan.jpeg" alt="Logo Bicicletería" width="100">
            </div>
            <ul class="nav navbar-nav head--menu--items">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $url ?>/admin">Administrador</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $url ?>/index.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $url ?>/productos.php">Productos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $url ?>/nosotros.php">Nosotros</a>
                </li>
            </ul>
        </nav>
    </header>

    <div class="container">
        <br>
        <div class="row">