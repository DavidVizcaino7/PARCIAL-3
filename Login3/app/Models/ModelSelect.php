<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelSelect extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'id_login';

    // Obtener todos los usuarios mediante SP
    public function obtenerUsuarios()
    {
        return $this->db->query("CALL SP_SELECT_USUARIO()")->getResultArray();
    }
}
