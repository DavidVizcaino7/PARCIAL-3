<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>Gestión de Usuarios</title>
  <link rel="stylesheet" href="<?= base_url('public/css/bootstrap.min.css') ?>">
</head>

<body style="background-color: #f2f2f2;">
  <div class="container mt-5">

    <!-- Botón Cerrar Sesión -->
    <div class="d-flex justify-content-end mb-3">
      <a href="<?= base_url('login/logout') ?>" class="btn btn-outline-danger">Cerrar Sesión</a>
    </div>

    <!-- Mensaje de bienvenida -->
    <div class="mb-4 text-center">
      <h4>¡Bienvenido, <strong><?= esc(session()->get('usuario')) ?></strong>!</h4>
    </div>

    <h2 class="text-center mb-4">Gestión de Usuarios</h2>

    <!-- Formulario para insertar nuevo usuario -->
    <div class="card mb-4">
      <div class="card-header">Agregar Usuario</div>
      <div class="card-body">
        <form action="<?= base_url('usuarios/insertar') ?>" method="post">
          <div class="row">
            <div class="col-md-5">
              <input type="text" name="usuario" class="form-control" placeholder="Nombre de usuario" required>
            </div>
            <div class="col-md-5">
              <input type="password" name="clave" class="form-control" placeholder="Contraseña" required>
            </div>
            <div class="col-md-2">
              <button type="submit" class="btn btn-success w-100">Registrar</button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <!-- Tabla con usuarios existentes -->
    <div class="card">
      <div class="card-header">Usuarios Registrados</div>
      <div class="card-body">
        <table class="table table-bordered table-striped">
          <thead class="table-dark">
            <tr>
              <th>ID</th>
              <th>Usuario</th>
              <th>Hash de Contraseña</th> <!-- Nueva columna -->
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($usuarios as $u): ?>
              <tr>
                <td><?= esc($u['id_login']) ?></td>
                <td><?= esc($u['user']) ?></td>
                <td><small><?= esc($u['password']) ?></small></td> <!-- Muestra el hash -->
                <td>
                  <form action="<?= base_url('usuarios/eliminar/' . $u['id_login']) ?>" method="post"
                    onsubmit="return confirm('¿Estás seguro de eliminar este usuario?');">
                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                  </form>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
        <p class="text-muted">* No se permite eliminar todos los usuarios del sistema.</p>
      </div>
    </div>
  </div>

  <script src="<?= base_url('public/js/bootstrap.bundle.min.js') ?>"></script>
</body>

</html>
