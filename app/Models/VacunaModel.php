<?php

namespace App\Models;

use CodeIgniter\Model;

class VacunaModel extends Model {
    
    protected $table = "vacunas";
    protected $primaryKey = "id";
    protected $allowedFields = [
        "id",
        "idMascota",
        "fecha",
        "nombre"
    ];


    function all(){
       
  return $this->db->table('vacunas')->get()->getResult();
    }


    public function getVacunas(){

        return  $this->db->table('vacunas as c')
        ->select('c.*, m.nombre as mascota')
        ->join('mascotas as m','c.idMascota = m.id')
        ->get()
        ->getResultArray();


    }
        
}