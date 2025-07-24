<?php

namespace App\Models;
use CodeIgniter\Model;

// Modelo para manejar la tabla 'usuarios' en la base de datos
class UsuarioModel extends Model
{
    // Nombre de la tabla en la base de datos
    protected $table      = 'usuarios';

    // Llave primaria de la tabla
    protected $primaryKey = 'id_login';

    // Campos que se pueden insertar o actualizar en la tabla
    protected $allowedFields = ['user', 'password'];

    // Desactiva el manejo automático de campos de tiempo (created_at, updated_at)
    public    $timestamps = false;
}
