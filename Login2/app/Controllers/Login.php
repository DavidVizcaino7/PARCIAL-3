<?php

namespace App\Controllers;
use App\Models\UsuarioModel;
use Config\Database;

class Login extends BaseController
{
    // Muestra la vista del formulario de login
    public function index()
    {
        helper(['form', 'url']);  // Carga helpers para formularios y URLs
        return view('login');     // Retorna la vista 'login'
    }

    // Método que valida las credenciales del usuario
    public function validar()
    {
        helper(['form', 'url']);  // Helpers para manejar formularios y redirecciones

        // Obtiene los datos enviados vía POST desde el formulario
        $usuario = $this->request->getPost('username');
        $clave = $this->request->getPost('password');

        // Instancia el modelo y busca en la base de datos un usuario con esos datos
        $model = new UsuarioModel();
        $user = $model->where('user', $usuario)
                      ->where('password', $clave)
                      ->first();

        if ($user) {
            // Si se encuentra el usuario, se inicia sesión y se guardan datos en session
            session()->set('logueado', true);
            session()->set('usuario', $user['user']);
            return redirect()->to(base_url('Inicio')); // Redirige a la página de inicio
        } else {
            // Si no se encuentra el usuario, muestra mensaje de error
            $data['error'] = 'Usuario o contraseña incorrectos🚫';
            return view('login', $data);
        }
    }

    // Método para cerrar la sesión del usuario
    public function logout()
    {
        session()->destroy();  // Destruye la sesión completa
        return redirect()->to(base_url('login'));
    }

    // Método para probar conexión directa con la base de datos
    public function MetodoTestear()
    {
        $db = \Config\Database::connect(); // Se conecta usando configuración de app\Config\Database.php o archivo .env
        if ($db->connect()) {
            echo 'Conexión Correcta ✅'; // Si logra conectarse, muestra mensaje
        } else {
            echo 'Conexión Fallida ❌'; // Si falla la conexión, muestra error
        }
    }
}
