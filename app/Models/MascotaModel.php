<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;

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


    function all(){
        //"SELECT * FROM mascotas"

        return $this->db->table('mascotas')->get()->getResult();
    }


    public function getMascotas(){

        return  json_encode($this->db->table('mascotas as m')
        ->select('m.*, a.nombre as animal, u.nombre as cliente')
        ->join('animales as a','m.idAnimal = a.id')
        ->join('usuarios as u','m.idCliente = u.id')
        ->get()
        ->getResult());

/*
        return $this->db->table('mascotas as m')
        ->select('m.*, a.nombre as animal, u.nombre as cliente')
        ->join('animales as a','m.idAnimal = a.id')
        ->join('usuarios as u','u.idCliente = u.id')
        ->get()
        ->getResult();

        
*/


        //$builder = $this->db->table("animales as a");
        //$builder->select('a.*, mascota.nombre as mascota');
        //$builder->join('mascotas as mascota', 'animal.id = mascota.idAnimal');
    }
    
}