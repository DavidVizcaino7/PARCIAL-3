<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelDelete extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'id_login';

    // Eliminar usuario por ID usando SP
    public function eliminarUsuario($id)
    {
        return $this->db->query("CALL SP_DELETE_USUARIO(?)", [$id]);
    }
}
