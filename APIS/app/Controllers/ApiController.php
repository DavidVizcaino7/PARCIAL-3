<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class ApiController extends ResourceController
{
    // Indica que las respuestas serán en formato JSON
    protected $format = 'json';

    // Método para obtener todos los usuarios (GET)
    public function index()
    {
        $model = new \App\Models\ApiSelect();
        $usuarios = $model->getUsuario(); // Llama al modelo para obtener usuarios

        // Devuelve respuesta JSON con status 200 y lista de usuarios
        return $this->respond([
            'status' => 200,
            'data' => $usuarios
        ]);
    }

    // Método para crear un nuevo usuario (POST)
    public function create()
    {
        // Obtiene datos JSON enviados en la petición
        $input = $this->request->getJSON(true);

        // Valida que vengan los campos obligatorios
        if (!isset($input['usuario']) || !isset($input['clave'])) {
            return $this->respond([
                'status' => 400,
                'message' => 'Faltan datos para crear usuario'
            ], 400);
        }

        $model = new \App\Models\ApiSelect();

        // Hashea la clave para seguridad antes de guardar
        $claveHasheada = password_hash($input['clave'], PASSWORD_DEFAULT);

        // Llama al modelo para insertar usuario
        $creado = $model->postUsuario($input['usuario'], $claveHasheada);

        // Si falla la creación, responde error 500
        if (!$creado) {
            return $this->respond([
                'status' => 500,
                'message' => 'Error al crear usuario'
            ], 500);
        }

        // Respuesta exitosa con código 201 (creado)
        return $this->respond([
            'status' => 201,
            'message' => 'Usuario creado correctamente'
        ], 201);
    }

    // Método para actualizar un usuario por ID (PUT)
    public function update($id = null)
    {
        $input = $this->request->getJSON(true);

        // Validar que se reciban los campos necesarios
        if (!isset($input['usuario']) || !isset($input['clave'])) {
            return $this->respond([
                'status' => 400,
                'message' => 'Faltan datos para actualizar'
            ], 400);
        }

        $model = new \App\Models\ApiSelect();

        // Hashear la nueva clave
        $claveHasheada = password_hash($input['clave'], PASSWORD_DEFAULT);

        // Llamar al modelo para actualizar usuario
        $actualizado = $model->updateUsuario($id, $input['usuario'], $claveHasheada);

        // Si falla la actualización, responder error 500
        if (!$actualizado) {
            return $this->respond([
                'status' => 500,
                'message' => 'Error al actualizar usuario'
            ], 500);
        }

        // Obtener todos los usuarios para encontrar el actualizado
        $usuarios = $model->getUsuario();

        // Filtrar el usuario actualizado por ID
        $usuarioActualizado = array_filter($usuarios, fn($u) => $u['id_login'] == $id);
        $usuarioActualizado = array_values($usuarioActualizado);

        // Responder con los datos actualizados y status 200
        return $this->respond([
            'status' => 200,
            'message' => 'Usuario actualizado correctamente',
            'data' => $usuarioActualizado[0] ?? null
        ], 200);
    }

    // Método para eliminar un usuario por ID (DELETE)
    public function delete($id = null)
    {
        // Validar que se haya enviado el ID
        if (!$id) {
            return $this->respond([
                'status' => 400,
                'message' => 'ID de usuario requerido para eliminar'
            ], 400);
        }

        $model = new \App\Models\ApiSelect();

        // Llamar al modelo para eliminar usuario
        $eliminado = $model->deletUsuario($id);

        // Registrar el valor devuelto para debugging en logs
        \log_message('debug', 'Valor de $eliminado en delete: ' . var_export($eliminado, true));

        // Si ocurrió un error, responder con status 500
        if ($eliminado === false) {
            return $this->respond([
                'status' => 500,
                'message' => 'Error al eliminar usuario'
            ], 500);
        }

        // Si se eliminó correctamente, responder status 200
        if ($eliminado === true) {
            return $this->respond([
                'status' => 200,
                'message' => 'Usuario eliminado correctamente'
            ], 200);
        }

        // Si se recibe un valor inesperado, responder con debug y error 500
        return $this->respond([
            'status' => 500,
            'message' => 'Valor inesperado devuelto por el modelo',
            'valor' => $eliminado,
        ], 500);
    }
}
