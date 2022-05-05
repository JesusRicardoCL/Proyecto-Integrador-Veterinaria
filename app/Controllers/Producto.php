<?php
namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\models\UsuarioModel;
use App\models\AnimalModel;
use App\Models\productoModel;
use Config\Services;

Class Producto extends ResourceController {

    protected $modelName = 'App\Models\ProductoModel';
    protected $format = 'json';

    public function index(){

        $data=[
            "productos" => $this->model->findAll(),
         ]; 

        echo view('producto/index',$data);
    }

    public function login(){
        echo view('usuario/login');
    }

    public function showAll(){
        
        $data=[
           "productos" => $this->model->findAll()
        ]; 

        return $this->respond($data);
    }

    public function show($id = NULL){
        $data=[
            "producto" => $this->model->find($id)
        ];

        return $this->respond($data);
    }

    public function create(){

       $data=[
        "nombre" => $this->request->getPost('nombre'),
        "descripcion" => $this->request->getPost('descripcion'),
        "cantidad" => $this->request->getPost('cantidad'),
        "precio" => $this->request->getPost('precio'),
       ];

       $id = $this->model->insert($data);

       if($id){
            return $this->respond($this->model->find($id));
       }else{
            return $this->respond(["error" => "El producto no se agrego correctamente!"]);
       }
    }

    public function update($id=null){

        $data = [];

        if(!empty($this->request->getPost('nombre')))
        $data["nombre"] = $this->request->getPost('nombre');
        
        if(!empty($this->request->getPost('descripcion')))
        $data["descripcion"] = $this->request->getPost('descripcion');

        if(!empty($this->request->getPost('cantidad')))
        $data["cantidad"] = $this->request->getPost('cantidad');

        if(!empty($this->request->getPost('precio')))
        $data["precio"] = $this->request->getPost('precio');

        $result = $this->model->update($id,$data);
 
        if($result){
            $producto = $this->respond($this->model->find($id));
            return $this->respond(
                ["result" => "El producto se edito correctamente!",
                "data"=>$producto]);
        }else{
             return $this->respond(["error" => "El producto no se edito correctamente!"]);
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