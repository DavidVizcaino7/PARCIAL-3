<?php

namespace App\Models;

use CodeIgniter\Model;

class ApiSelect extends Model
{
    protected $db;

    public function __construct()
    {
        parent::__construct();
        // Conexión a la base de datos usando la configuración de CodeIgniter
        $this->db = \Config\Database::connect();
    }

    // Obtener todos los usuarios llamando al procedimiento almacenado SP_SELECT_USUARIO
    public function getUsuario()
    {
        try {
            $query = $this->db->query("CALL SP_SELECT_USUARIO()");
            return $query->getResultArray(); // Devuelve los resultados como arreglo asociativo
        } catch (\Throwable $th) {
            // Registrar error en log y devolver arreglo vacío si falla la consulta
            log_message('error', 'Error getUsuario: ' . $th->getMessage());
            return [];
        }
    }

    // Crear un usuario nuevo llamando al procedimiento almacenado SP_INSERT_USUARIO
    public function postUsuario($user, $password)
    {
        try {
            // Ejecuta el SP con parámetros (usuario y clave hasheada)
            $this->db->query("CALL SP_INSERT_USUARIO(?, ?)", [$user, $password]);
            // Retorna true si se afectó al menos una fila (registro insertado)
            return $this->db->affectedRows() > 0;
        } catch (\Throwable $th) {
            // Registrar error en log y devolver false si falla la inserción
            log_message('error', 'Error postUsuario: ' . $th->getMessage());
            return false;
        }
    }

    // Actualizar usuario usando procedimiento almacenado SP_UPDATE_USUARIO
    public function updateUsuario($id, $user, $password)
    {
        try {
            $this->db->query("CALL SP_UPDATE_USUARIO(?, ?, ?)", [$id, $user, $password]);

            // Verificar si ocurrió algún error en la ejecución del SP
            $error = $this->db->error();
            if (!empty($error['code']) && $error['code'] != 0) {
                log_message('error', 'Error updateUsuario: ' . json_encode($error));
                return false;
            }

            // Retornar true aunque no se haya afectado filas (no necesariamente es error)
            return true;
        } catch (\Throwable $th) {
            // Registrar error y devolver false si falla la consulta
            log_message('error', 'Error updateUsuario: ' . $th->getMessage());
            return false;
        }
    }

    // Eliminar usuario con procedimiento almacenado SP_DELETE_USUARIO
    public function deletUsuario($id)
    {
        try {
            $this->db->query("CALL SP_DELETE_USUARIO(?)", [$id]);

            // Verificar si hubo error en la ejecución
            $error = $this->db->error();
            if (!empty($error['code']) && $error['code'] != 0) {
                log_message('error', 'Error deletUsuario: ' . json_encode($error));
                return false;
            }

            // Retornar true si se afectó alguna fila (registro eliminado)
            if ($this->db->affectedRows() > 0) {
                return true;
            } else {
                // No se eliminó ningún registro (quizás ID no existía)
                log_message('debug', 'No se eliminó ningún registro para ID ' . $id);
                return true; // Puedes cambiar a false si prefieres tratarlo como error
            }

        } catch (\Throwable $th) {
            // Registrar error y devolver false si falla la consulta
            log_message('error', 'Error deletUsuario: ' . $th->getMessage());
            return false;
        }
    }
}
