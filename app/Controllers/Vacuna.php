<?php
namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

use App\models\MascotaModel;

use App\Models\VacunaModel;
use Config\Services;

Class Vacuna extends ResourceController {

    protected $modelName = 'App\Models\VacunaModel';
    protected $format = 'json';

    public function innerJoinMethod()
    {

        $db = db_connect();
        $model = new VacunaModel($db);
        $result = $this->model->getVacunas();
        echo '<pre>';
            print_r($result);
        echo '<pre>';

        
    }



   

    public function index(){
        $db = db_connect();
        $model = new VacunaModel($db);
        $result = $this->model->getVacunas();
       
       
        $mascotaModel = new MascotaModel();
        
       
       
        $data=[
            "vacunas" => $this->model->getVacunas(),
            //"vacunas" => $this->model->findAll(),
            
            "mascotas" => $mascotaModel->findAll(),
            
            
         ]; 

        echo view('vacuna/index',$data);
    }

    public function login(){
        echo view('usuario/login');
    }

    public function showAll(){
        
        $data=[
           "vacunas" => $this->model->findAll()
        ]; 

        return $this->respond($data);
    }

    public function show($id = NULL){
        $data=[
            "vacuna" => $this->model->find($id)
        ];

        return $this->respond($data);
    }

    public function create(){

        $data=[

            "idMascota" => $this->request->getPost('idMascota'),
            "fecha" => $this->request->getPost('fecha'),
            "nombre" => $this->request->getPost('nombre'),
         
           
       ];

       $id = $this->model->insert($data);

       if($id){
            return $this->respond($this->model->find($id));
       }else{
            return $this->respond(["error" => "La Vacuna  no se agrego correctamente!"]);
       }
    }

    public function update($id=null){

        $data = [];

        if(!empty($this->request->getPost('idMascota')))
        $data["idMascota"] = $this->request->getPost('idMascota');

        if(!empty($this->request->getPost('fecha')))
        $data["fecha"] = $this->request->getPost('fecha');

        if(!empty($this->request->getPost('nombre')))
        $data["nombre"] = $this->request->getPost('nombre');

        $result = $this->model->update($id,$data);
 
        if($result){
            $vacuna = $this->respond($this->model->find($id));
            return $this->respond(
                ["result" => "El cita se edito correctamente!",
                "data"=>$vacuna]);
        }else{
             return $this->respond(["error" => "El cita no se edito correctamente!"]);
        }
    }

    public function delete($id=null){
        $result = $this->model->delete($id);

        if($result){
            return $this->respond(["result" => "El producto se elimino correctamente!"]);
        }else{
             return $this->respond(["error" => "El producto no se elimino correctamente!"]);
        }
    }

}