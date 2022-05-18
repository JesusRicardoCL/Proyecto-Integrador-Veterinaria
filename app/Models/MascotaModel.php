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
        "idUsuario"
    ];


    function all(){
        //"SELECT * FROM mascotas"

        return $this->db->table('mascotas')->get()->getResult();
    }


    public function getMascotas(){

        return  $this->db->table('mascotas as m')
        ->select('m.*, a.nombre as animal, u.nombre as cliente')
        ->join('animales as a','m.idAnimal = a.id')
        ->join('usuarios as u','m.idUsuario = u.id')
        ->get()
        ->getResultArray();


        
/*
        return $this->db->table('mascotas as m')
        ->select('m.*, a.nombre as animal, u.nombre as cliente')
        ->join('animales as a','m.idAnimal = a.id')
        ->join('usuarios as u','u.idUsuario = u.id')
        ->get()
        ->getResult();

        
*/


        //$builder = $this->db->table("animales as a");
        //$builder->select('a.*, mascota.nombre as mascota');
        //$builder->join('mascotas as mascota', 'animal.id = mascota.idAnimal');
    }

    public function getMascotasByUser($idUsuario){
        return  $this->db->table('mascotas as m')
        ->select('m.*, a.nombre as animal, u.nombre as cliente')
        //->where("idUsuario",$idUsuario)
        ->join('animales as a','m.idAnimal = a.id')
        ->join('usuarios as u','m.idUsuario = u.id')
        ->getWhere(['m.idUsuario' => $idUsuario])
        ->getResultArray();
    }
    
}