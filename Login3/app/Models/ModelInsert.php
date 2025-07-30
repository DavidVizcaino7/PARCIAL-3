<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelInsert extends Model
{
    protected $table = 'usuarios';
    protected $allowedFields = ['user', 'password'];

    // Insertar usuario mediante SP
    public function insertarUsuario($usuario, $clave)
    {
        $claveHash = password_hash($clave, PASSWORD_DEFAULT);
        return $this->db->query("CALL SP_INSERT_USUARIO(?, ?)", [$usuario, $claveHash]);
    }
}
