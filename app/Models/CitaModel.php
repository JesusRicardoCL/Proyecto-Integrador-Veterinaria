<?php

namespace App\Models;

use CodeIgniter\Model;

class CitaModel extends Model {
    
    protected $table = "citas";
    protected $primaryKey = "id";
    protected $allowedFields = [
        "id",
        "idUsuario",
        "idMascota",
        "descripcion",
        "fecha",
        "hora",
        "ubicacion"
    ];
    
  
}