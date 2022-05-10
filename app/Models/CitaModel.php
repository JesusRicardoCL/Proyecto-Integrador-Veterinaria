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
    
    function all(){
       

        return $this->db->table('citas')->get()->getResult();
    }


    public function getCitas(){

        return  $this->db->table('citas as c')
        ->select('c.*, m.nombre as mascota, u.nombre as cliente')
        ->join('mascotas as m','c.idMascota = m.id')
        ->join('usuarios as u','c.idUsuario = u.id')
        ->get()
        ->getResultArray();


    }
  
}