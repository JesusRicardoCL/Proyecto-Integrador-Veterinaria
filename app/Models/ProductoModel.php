<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductoModel extends Model {
    
    protected $table = "productos";
    protected $primaryKey = "id";
    protected $allowedFields = [
        "id",
        "nombre",
        "descripcion",
        "cantidad",
        "precio"
    ];
    
}