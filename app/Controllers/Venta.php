<?php
namespace App\Controllers;
use App\models\UsuarioModel;
use CodeIgniter\RESTful\ResourceController;

Class Venta extends ResourceController{

    protected $modelName = 'App\Models\VentaModel';
    protected $format = 'json';

    public function index(){
        
        $data=[
           "ventas" => $this->model->findAll()
        ]; 

        echo view('venta/index',$data);
    }

    public function show($id = NULL){
        $data=[
            "venta" => $this->model->find($id)
        ];

        return $this->respond($data);
    }

    public function create(){

       $data=[
        "productos" => $this->request->getPost('productos'),
        "descripcion" => $this->request->getPost('descripcion'),
        "fecha" => $this->request->getPost('fecha'),
        "total" => $this->request->getPost('total')
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

        if(!empty($this->request->getPost('productos')))
        $data["productos"] = $this->request->getPost('productos');

        if(!empty($this->request->getPost('descripcion')))
        $data["descripcion"] = $this->request->getPost('descripcion');

        if(!empty($this->request->getPost('fecha')))
        $data["fecha"] = $this->request->getPost('fecha');

        if(!empty($this->request->getPost('total')))
        $data["total"] = $this->request->getPost('total');

        $result = $this->model->update($id,$data);
 
        if($result){
            $venta = $this->respond($this->model->find($id));
            return $this->respond(
                ["result" => "El producto se edito correctamente!",
                "data"=>$venta]);
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