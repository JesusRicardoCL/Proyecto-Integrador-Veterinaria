<?php
namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

Class Animal extends ResourceController{

    protected $modelName = 'App\Models\AnimalModel';
    protected $format = 'json'; 

    public function index(){
        
        $data=[
           "animales" => $this->model->findAll()
        ]; 

        echo view('animal/index',$data);
    }

    public function show($id = NULL){
        $data=[
            "animal" => $this->model->find($id)
        ];

        return $this->respond($data);
    }

    public function create(){

       $data=[
        "nombre" => $this->request->getPost('nombre')
       ];

       $id = $this->model->insert($data);

       if($id){
            return $this->respond($this->model->find($id));
       }else{
            return $this->respond(["error" => "El animal no se agrego correctamente!"]);
       }
    }

    public function update($id=null){

        $data = [];

        if(!empty($this->request->getPost('nombre')))
        $data["nombre"] = $this->request->getPost('nombre');

        $result = $this->model->update($id,$data);
 
        if($result){
            $animal = $this->respond($this->model->find($id));
            return $this->respond(
                ["result" => "El animal se edito correctamente!",
                "data"=>$animal]);
        }else{
             return $this->respond(["error" => "El animal no se edito correctamente!"]);
        }
    }

    public function delete($id=null){
        $result = $this->model->delete($id);

        if($result){
            return $this->respond(["result" => "El animal se elimino correctamente!"]);
        }else{
             return $this->respond(["error" => "El animal no se elimino correctamente!"]);
        }
    }

}