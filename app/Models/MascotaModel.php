<?php

namespace App\Models;

use CodeIgniter\Model;

class MascotaModel extends Model {
    
    protected $table = "mascotas";
    protected $primaryKey = "id";
    protected $allowedFields = [
        "id",
        "nombre",
        "raza",
        "descripcion",
        "idAnimal",
        "idCliente"
    ];
    
}