<?php
namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\models\UsuarioModel;
use App\models\AnimalModel;
use App\Models\MascotaModel;
use App\Models\VacunaModel;
use Config\Services;

Class Mascota extends ResourceController {

    protected $modelName = 'App\Models\MascotaModel';
    protected $format = 'json';

    //Funcion con la que estuve haciendo pruebas -Ricardo
    public function innerJoinMethod()
    {

        $db = db_connect();
        $model = model('App\Models\MascotaModel');
        $result = $this->model->getMascotas();
        echo '<pre>';
            print_r($result);
        echo '<pre>';

        //$builder = $this->db->table("animales as a");
        //$builder->select('a.*, mascota.nombre as mascota');
        //$builder->join('mascotas as mascota', 'animal.id = mascota.idAnimal');
        
        //$data = $builder->get()->getResult();
        

        //echo "<pre>";
        //print_r($data);




        //--------
        //$builder = $this->db->table("tbl_users as user");
        //$builder->select('user.*, course.name as course_name');
        //$builder->join('tbl_courses as course', 'user.id = course.user_id');
        //$data = $builder->get()->getResult();
        //--------
      
        
    }

    public function index(){
 
        $mascotaModel = model('App\Models\MascotaModel');
        $usuarioModel = model('App\Models\UsuarioModel');
        $animalModel = model('App\Models\AnimalModel');
        
        $data=[

             "mascotas" => $mascotaModel->getMascotas(),
             "usuarios" => $usuarioModel->findAll(),
             "animales" => $animalModel->findAll(),
         ]; 

        echo view('mascota/index',$data);
    }

    public function detalles($id = NULL){

        $usuarioModel = model('App\Models\UsuarioModel');
        $animalModel = model('App\Models\AnimalModel');
        $vacunaModel = model('App\Models\VacunaModel');

        $data=[
            "mascota" => $this->model->find($id),
            "usuarios" => $usuarioModel->findAll(),
            "animales" => $animalModel->findAll(),
            "vacunas" => $vacunaModel->getByMascota($id)
        ];

        //return $this->respond($data);
        echo view('mascota/detalles',$data);
    }

    public function login(){
        

        echo view('usuario/login');
    }

    public function showAll(){
        
        $data=[
           "mascotas" => $this->model->findAll()
        ]; 

        return $this->respond($data);
    }

    public function show($id = NULL){
        $data=[
            "mascota" => $this->model->find($id)
        ];

        return $this->respond($data);
    }

    public function showByUser($id = NULL){

        $result = $this->model->getMascotasByUser($id);

        $data=[
            "mascotas" => $result
        ];

        return $this->respond($data);
    }

    public function create(){

       $data=[
        "nombre" => $this->request->getPost('nombre'),
        "raza" => $this->request->getPost('raza'),
        "descripcion" => $this->request->getPost('descripcion'),
        "idAnimal" => $this->request->getPost('idAnimal'),
        "idUsuario" => $this->request->getPost('idUsuario')
       ];

       $id = $this->model->insert($data);

       if($id){
            return $this->respond($this->model->find($id));
       }else{
            return $this->respond(["error" => "La mascota no se agrego correctamente!"]);
       }
    }

    public function update($id=null){

        $data = [];

        if(!empty($this->request->getPost('nombre')))
        $data["nombre"] = $this->request->getPost('nombre');
        
        if(!empty($this->request->getPost('raza')))
        $data["raza"] = $this->request->getPost('raza');

        if(!empty($this->request->getPost('descripcion')))
        $data["descripcion"] = $this->request->getPost('descripcion');

        if(!empty($this->request->getPost('idAnimal')))
        $data["idAnimal"] = $this->request->getPost('idAnimal');

        if(!empty($this->request->getPost('idUsuario')))
        $data["idUsuario"] = $this->request->getPost('idUsuario');

        $result = $this->model->update($id,$data);
 
        if($result){
            $mascota = $this->respond($this->model->find($id));
            return $this->respond(
                ["result" => "La mascota se edito correctamente!",
                "data"=>$mascota]);
        }else{
             return $this->respond(["error" => "La mascota no se edito correctamente!"]);
        }
    }

    public function delete($id=null){
        $result = $this->model->delete($id);

        if($result){
            return $this->respond(["result" => "La mascota se elimino correctamente!"]);
        }else{
             return $this->respond(["error" => "La mascota no se elimino correctamente!"]);
        }
    }

}