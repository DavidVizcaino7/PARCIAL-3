<?php

namespace App\Controllers;

// Controlador que maneja la página de bienvenida
class Inicio extends BaseController{
    public function index()
    {
        // Verifica si el usuario NO ha iniciado sesión (no está logueado)
        if (!session()->get('logueado')) {
            // Redirige al usuario a la página de login si no está autenticado
            return redirect()->to(base_url('login'));
        }

        // Si el usuario está autenticado, carga la vista 'bienvenido'
        return view('Inicio');
    }
}
    