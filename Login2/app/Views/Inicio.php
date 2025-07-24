<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Página de Inicio</title>
  <link rel="stylesheet" href="<?= base_url('public/css/bootstrap.min.css') ?>">

  <style>
    .fade-in {
      opacity: 0;
      transform: translateY(20px);
      animation: fadeInUp 1s ease-out forwards;
    }

    @keyframes fadeInUp {
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
  </style>
</head>
<body style="background-color: #e9ecef;">

  <div class="container mt-5">

    <div class="card shadow-lg fade-in">
      <div class="card-body">

        <!-- Imagen -->
        <div class="text-center">
          <img src="<?= base_url('public/img/imag.jpg') ?>" alt="Imagen informativa" class="img-fluid rounded mb-4" style="max-height: 250px;">
          <h2 class="card-title">¡Bienvenido!</h2>
          <p class="lead">Hola, <strong><?= esc(session()->get('usuario')) ?></strong>. Has iniciado sesión correctamente.</p>
        </div>

        <!-- Navegación de pestañas -->
        <ul class="nav nav-tabs mt-4" id="infoTabs" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="tab1-tab" data-bs-toggle="tab" data-bs-target="#tab1" type="button" role="tab">¿Qué es CodeIgniter?</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="tab2-tab" data-bs-toggle="tab" data-bs-target="#tab2" type="button" role="tab">Patrón MVC</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="tab3-tab" data-bs-toggle="tab" data-bs-target="#tab3" type="button" role="tab">Base de Datos</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="tab4-tab" data-bs-toggle="tab" data-bs-target="#tab4" type="button" role="tab">Ventajas</button>
          </li>
        </ul>

        <!-- Contenido de pestañas -->
        <div class="tab-content mt-3" id="infoTabsContent">

          <!-- Tab 1 -->
          <div class="tab-pane fade show active" id="tab1" role="tabpanel">
            <h5>📘 ¿Qué es CodeIgniter?</h5>
            <p>
              CodeIgniter es un framework PHP que permite construir aplicaciones web de forma rápida, ligera y estructurada.
              Está basado en el patrón MVC y facilita la conexión con bases de datos, la creación de rutas y la reutilización de código.
            </p>
          </div>

          <!-- Tab 2 -->
          <div class="tab-pane fade" id="tab2" role="tabpanel">
            <h5>🧩 ¿Qué es el patrón MVC?</h5>
            <ul>
              <li><strong>Modelo (Model):</strong> maneja la lógica de la base de datos.</li>
              <li><strong>Vista (View):</strong> muestra la interfaz del usuario.</li>
              <li><strong>Controlador (Controller):</strong> comunica modelos y vistas.</li>
            </ul>
            <p>
              Separar estas partes mejora la organización del código, facilita el mantenimiento y reduce errores.
            </p>
          </div>

          <!-- Tab 3 -->
          <div class="tab-pane fade" id="tab3" role="tabpanel">
            <h5>💡 Manejo de base de datos en CodeIgniter</h5>
            <p>
              CodeIgniter permite interactuar con la base de datos usando modelos. Puedes hacer operaciones CRUD fácilmente.
            </p>
            <pre><code>
$user = $model->where('user', $usuario)
              ->where('password', $clave)
              ->first();
            </code></pre>
            <p>
              Así se valida un usuario. Los métodos están protegidos contra inyecciones SQL, lo que mejora la seguridad.
            </p>
          </div>

          <!-- Tab 4 -->
          <div class="tab-pane fade" id="tab4" role="tabpanel">
            <h5>✅ Ventajas de usar CodeIgniter</h5>
            <ul>
              <li>Fácil de aprender y usar</li>
              <li>Rápido y con bajo consumo de recursos</li>
              <li>Documentación clara y extensa</li>
              <li>Compatible con múltiples bases de datos</li>
              <li>Ideal para proyectos educativos y profesionales</li>
            </ul>
          </div>

        </div>

        <!-- Botón de cerrar sesión -->
        <div class="text-center mt-4">
          <a href="<?= base_url('login/logout') ?>" class="btn btn-outline-danger">Cerrar Sesión</a>
        </div>

      </div>
    </div>

  </div>

  <!-- JS de Bootstrap -->
  <script src="<?= base_url('public/js/bootstrap.bundle.min.js') ?>"></script>
</body>
</html>
