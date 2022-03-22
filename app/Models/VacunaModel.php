<?php

namespace App\Models;

use CodeIgniter\Model;

class VucunaModel extends Model {
    
    protected $table = "vacunas";
    protected $primaryKey = "id";
    protected $allowedFields = [
        "id",
        "idMascota",
        "fecha",
        "nombre"
    ];
    
}