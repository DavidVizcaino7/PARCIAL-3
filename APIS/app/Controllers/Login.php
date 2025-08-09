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

        // Instancia el modelo y busca el usuario por nombre
        $model = new UsuarioModel();
        $user = $model->where('user', $usuario)->first(); // Solo busca por el usuario

        // Verifica si el usuario existe y la contraseña es correcta
        if ($user && password_verify($clave, $user['password'])) {
            // Contraseña válida, se inicia sesión
            session()->set('logueado', true);
            session()->set('usuario', $user['user']);
            return redirect()->to(base_url('Vista')); // Redirige a la vista protegida
        } else {
            // Si no se encuentra el usuario o la contraseña no coincide
            $data['error'] = 'Usuario o contraseña incorrectos 🚫';
            return view('login', $data);
        }
    }

    // Método para cerrar la sesión del usuario
    public function logout()
    {
        session()->destroy();  // Destruye toda la sesión
        return redirect()->to(base_url('login'));
    }

    // Método para probar conexión directa con la base de datos
    public function MetodoTestear()
    {
        $db = \Config\Database::connect(); // Conexión con la base de datos
        if ($db->connect()) {
            echo 'Conexión Correcta ✅';
        } else {
            echo 'Conexión Fallida ❌';
        }
    }
}
