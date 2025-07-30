<?php

namespace App\Controllers;

use App\Models\ModelSelect;
use App\Models\ModelInsert;
use App\Models\ModelDelete;

class Usuarios extends BaseController
{
    // Mostrar formulario y lista de usuarios
    public function index()
    {
        $modelSelect = new ModelSelect();
        $data['usuarios'] = $modelSelect->obtenerUsuarios();
        return view('Vista', $data);  // Carga la vista Vista.php con datos
    }

    // Insertar un nuevo usuario
    public function insertar()
    {
        // Los nombres del formulario son 'usuario' y 'clave' (no 'user' y 'password')
        $usuario = $this->request->getPost('usuario');
        $password = $this->request->getPost('clave');

        if ($usuario && $password) {
            $modelInsert = new ModelInsert();
            $modelInsert->insertarUsuario($usuario, $password);
        }

        return redirect()->to('/Vista');  // Redirige a la lista actualizada
    }

    // Eliminar un usuario por ID
    public function eliminar($id)
    {
        $modelSelect = new ModelSelect();
        $usuarios = $modelSelect->obtenerUsuarios();

        // Evita eliminar si solo queda 1 usuario
        if (count($usuarios) > 1) {
            $modelDelete = new ModelDelete();
            $modelDelete->eliminarUsuario($id);
        }

        return redirect()->to('/Vista');  // Redirige a la lista actualizada
    }
}
