<?php
namespace App\Models;

use CodeIgniter\Model;

class ModelUpdate extends Model
{
    protected $DBGroup = 'default';

    public function actualizarUsuario($id, $usuario, $clave)
    {
        $db = \Config\Database::connect();

        // Hashear la contraseña antes de actualizar
        $claveHash = password_hash($clave, PASSWORD_DEFAULT);

        return $db->query("CALL SP_UPDATE_USUARIO(?, ?, ?)", [$id, $usuario, $claveHash]);
    }
}
