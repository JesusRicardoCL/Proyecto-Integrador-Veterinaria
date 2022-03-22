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
    
}