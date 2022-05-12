<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model {
    
    protected $table = "usuarios";
    protected $primaryKey = "id";
    protected $allowedFields = [
        "id",
        "nombre",
        "domicilio",
        "telefono",
        "correo",
        "contrasena",
        "tipo_usuario"
    ];

    public function obtenerPor(string $column, string $value){
        return $this->where($column,$value)->first();
    }

    public function login($user, $password){
        
        $result = $this->asArray()
        ->where([
            "telefono" => $user,
            "contrasena" => $password
        ]) ->orWhere([
            "correo" => $user,
            "contrasena" => $password
        ])->first();

        return $result;

    }
    
}