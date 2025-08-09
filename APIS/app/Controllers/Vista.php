<?php

namespace App\Controllers;

use App\Models\ModelSelect;

class Vista extends BaseController {
    public function index()
    {
        // Verifica si el usuario no está logueado en la sesión.
        // Si no lo está, redirige a la página de login.
        if (!session()->get('logueado')) {
            return redirect()->to(base_url('login'));
        }

        // Crea una instancia del modelo ModelSelect
        // que se encargará de obtener los datos de la base de datos.
        $modelSelect = new ModelSelect();

        // Llama al método obtenerUsuarios() para traer todos los usuarios
        // y los guarda en el array $data con la clave 'usuarios'.
        $data['usuarios'] = $modelSelect->obtenerUsuarios();

        // Carga la vista 'Vista' y le pasa el array $data
        // para que se puedan mostrar los datos en la interfaz.
        return view('Vista', $data);
    }
}
