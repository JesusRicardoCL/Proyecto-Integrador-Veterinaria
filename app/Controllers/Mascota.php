<?php
namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\models\MascotaModel;

use Config\Services;

Class Mascota extends ResourceController {

    protected $modelName = 'App\Models\MascotaModel';
    protected $format = 'json';

    public function index(){
        
        $data=[
            "mascotas" => $this->model->findAll()
         ]; 

        echo view('mascota/index',$data);
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

    public function create(){

       $data=[
        "nombre" => $this->request->getPost('nombre'),
        "raza" => $this->request->getPost('raza'),
        "descripcion" => $this->request->getPost('descripcion'),
        "animal" => $this->request->getPost('idAnimal'),
        "cliente" => $this->request->getPost('idCliente')
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

        if(!empty($this->request->getPost('idCliente')))
        $data["idCliente"] = $this->request->getPost('idCliente');

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