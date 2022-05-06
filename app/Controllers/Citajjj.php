<?php
namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\models\UsuarioModel;
use App\models\MascotaModel;

use App\Models\CitaModel;
use Config\Services;

Class Cita extends ResourceController {

    protected $modelName = 'App\Models\CitaModel';
    protected $format = 'json';

    //Funcion con la que estuve haciendo pruebas -Ricardo
    /*public function innerJoinMethod()
    {

        $db = db_connect();
        $model = new CitaModel($db);
        $result = $this->model->getCitas();
        echo '<pre>';
            print_r($result);
        echo '<pre>';

        
      
        
    }*/

    public function index(){

        $db = db_connect();
        $model = new CitaModel($db);
        $result = $this->model->getCitas();

        echo $result;

       $usuarioModel = new UsuarioModel();
        $mascotaModel = new MascotaModel();
        
        $data=[
            "citas" => $this->model->findAll(),
          "usuarios" => $usuarioModel->findAll(),
          "mascotas" => $mascotaModel->findAll(),
         ]; 

         echo view('cita/index',$data);
    }

    public function login(){
        

        echo view('usuario/login');
    }

    public function showAll(){
        
        $data=[
           "citas" => $this->model->findAll()
        ]; 

        return $this->respond($data);
    }

    public function show($id = NULL){
        $data=[
            "cita" => $this->model->find($id)
        ];

        return $this->respond($data);
    }
    

    public function create(){

       $data=[
        "idCliente" => $this->request->getPost('idCliente'),
        "idMascota" => $this->request->getPost('idMascota'),
        "fecha" => $this->request->getPost('fecha'),
        "hora" => $this->request->getPost('hora'),
        "ubicacion" => $this->request->getPost('ubicacion')
       ];

       $id = $this->model->insert($data);

       if($id){
            return $this->respond($this->model->find($id));
       }else{
            return $this->respond(["error" => "La cita no se agrego correctamente!"]);
       }
    }

  
    public function update($id=null){

        $data = [];

        if(!empty($this->request->getPost('idCliente')))
        $data["idCliente"] = $this->request->getPost('idCliente');
        
        if(!empty($this->request->getPost('idMascota')))
        $data["idMascota"] = $this->request->getPost('idMascota');

        if(!empty($this->request->getPost('fecha')))
        $data["fecha"] = $this->request->getPost('fecha');

        if(!empty($this->request->getPost('hora')))
        $data["hora"] = $this->request->getPost('hora');

        if(!empty($this->request->getPost('ubicacion')))
        $data["ubicacion"] = $this->request->getPost('ubicacion');

        $result = $this->model->update($id,$data);
 
        if($result){
            $cita = $this->respond($this->model->find($id));
            return $this->respond(
                ["result" => "La cita se edito correctamente!",
                "data"=>$cita]);
        }else{
             return $this->respond(["error" => "La cita no se edito correctamente!"]);
        }
    }

    public function delete($id=null){
        $result = $this->model->delete($id);

        if($result){
            return $this->respond(["result" => "La cita se elimino correctamente!"]);
        }else{
             return $this->respond(["error" => "La cita no se elimino correctamente!"]);
        }
    }

}