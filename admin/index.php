<?php
session_start();

if ($_POST) {
  if(($_POST['usuario'] === 'admin') && ($_POST['password'] === 'admin')){
    
    $_SESSION['usuario'] = 'ok';
    $_SESSION['nombreUsuario'] = 'admin';
    header('Location:inicio.php');

  } else {
    $mensaje = "ERROR: Usuario o contraseña incorrectos";
  }

}

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200;500;700;800&display=swap" rel="stylesheet" />
  <title>Login</title>
  <link rel="stylesheet" href="styles/main.css" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous" />
  <link rel="stylesheet" href="styles\normalize.css" />
</head>

<body>
  <main class="login-design">
    <div class="bicicleta">
      <img src="../media/logo-millan.jpeg" alt="" />
    </div>
    <div class="login">
      <div class="login-data">
        <img src="../media/iconobicicleta.ico" alt="" />
        <h1>Inicio de Sesión</h1>

        <?php if(isset($mensaje)) : ?>
          <div class="alert alert-danger" role="alert">
            <?php echo $mensaje; ?>
          </div>
        <?php endif; ?>

        <form action="index.php" method="post" class="login-form">
          <div class="input-group">
            <label class="input-fill">
              <input type="usuario" name="usuario" id="usuario" />
              <span class="input-label">Usuario</span>
              <i class="fas fa-user"></i>

            </label>
          </div>
          <div class="input-group">
            <label class="input-fill">
              <input type="password" name="password" id="password" />
              <span class="input-label">Contraseña</span>
              <i class="fas fa-lock"></i>
            </label>
          </div>
          <input type="submit" value="Iniciar Sesión" class="btn-login" />
        </form>
      </div>
    </div>
  </main>
</body>

</html>