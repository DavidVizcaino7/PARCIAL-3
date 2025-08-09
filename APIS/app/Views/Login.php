<!doctype html>
<html lang="es">
<head>
  <title>Iniciar Sesión</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Estilo propio -->
  <link rel="stylesheet" href="<?= base_url('public/css/bootstrap.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('public/css/style.css') ?>">
</head>

<body class="img js-fullheight" style="background-image: url('<?= base_url('public/img/fondo1.jpg') ?>');">

  <section class="ftco-section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6 text-center mb-5">
          <h2 class="heading-section">BIENVENIDO👋</h2>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-6 col-lg-4">
          <div class="login-wrap p-0">
            <h3 class="mb-4 text-center">INICIA SESIÓN👤</h3>

            <!-- Mostrar mensaje de error si lo hay -->
            <?php if (isset($error)): ?>
              <div class="alert alert-danger text-center"><?= esc($error) ?></div>
            <?php endif; ?>

            <form action="<?= base_url('login/validar') ?>" method="post" class="signin-form">
              <div class="form-group">
                <input type="text" name="username" value="<?= old('username') ?>" class="form-control" placeholder="Usuario" required>
              </div>
              <div class="form-group">
                <input id="password-field" type="password" name="password" class="form-control" placeholder="Contraseña" required>
                <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
              </div>
              <div class="form-group">
                <button type="submit" class="form-control btn btn-primary submit px-3">Iniciar Sesión</button>
              </div>
              <div class="form-group d-md-flex">
                <div class="w-50">
                  <label class="checkbox-wrap checkbox-primary">Recordarme
                    <input type="checkbox" checked>
                    <span class="checkmark"></span>
                  </label>
                </div>
              </div>
            </form>
            
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- JS -->
  <script src="<?= base_url('public/js/jquery.min.js') ?>"></script>
  <script src="<?= base_url('public/js/popper.js') ?>"></script>
  <script src="<?= base_url('public/js/bootstrap.min.js') ?>"></script>
  <script src="<?= base_url('public/js/main.js') ?>"></script>

</body>
</html>
