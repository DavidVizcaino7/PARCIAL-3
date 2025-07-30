<?php

namespace App\Controllers;

// Controlador principal (por defecto) que redirige al login
class Home extends BaseController
{
    public function index(): string
    {
        // Carga y muestra la vista 'Login' cuando se accede a la ruta principal
        return view('Login');
    }
}
