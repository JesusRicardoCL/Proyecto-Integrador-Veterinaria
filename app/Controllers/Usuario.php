<?php
namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

Class Usuario extends Auth{

    protected $modelName = 'App\Models\UsuarioModel';
    protected $format = 'json';


    public function index(){
        
        
        $data=[
            "usuarios" => $this->model->findAll()
         ]; 

        echo view('usuario/index',$data);
    }

    public function index2(){

        echo view('usuario/index2');
    }

    public function login(){
        
        echo view('usuario/login');
    }
/*
    public function auth(){

        $telefono = trim($this->request->getPost('telefono'));
        //$contrasena = trim($this->request->getVar('contrasena'));

        echo $telefono;

        if(!$this->model->obtenerPor('telefono',$telefono)){
            //echo "no funciona";
        } else {
            //echo "funciona";
        }
        
		//$datosUsuario = $this->model->login($data['telefono'],$data['contrasena']);


		return redirect()->to(base_url('usuario/index'));

    }
*/
    public function showAll(){
        
        $data=[
           "usuarios" => $this->model->findAll()
        ]; 

        

        return $this->respond($data);
    }

    public function show($id = NULL){
        $data=[
            "usuario" => $this->model->find($id)
        ];

        return $this->respond($data);
    }

    public function create(){

       $data=[
        "nombre" => $this->request->getPost('nombre'),
        "domicilio" => $this->request->getPost('domicilio'),
        "telefono" => $this->request->getPost('telefono'),
        "correo" => $this->request->getPost('correo'),
        "contrasena" => $this->request->getPost('contrasena'),
        "tipo_usuario" => $this->request->getPost('tipo_usuario')
       ];

       $id = $this->model->insert($data);

       if($id){
            return $this->respond($this->model->find($id));
       }else{
            return $this->respond(["error" => "El usuario no se agrego correctamente!"]);
       }
    }

    public function update($id=null){

        $data = [];

        if(!empty($this->request->getPost('nombre')))
        $data["nombre"] = $this->request->getPost('nombre');
        
        if(!empty($this->request->getPost('domicilio')))
        $data["domicilio"] = $this->request->getPost('domicilio');

        if(!empty($this->request->getPost('telefono')))
        $data["telefono"] = $this->request->getPost('telefono');

        if(!empty($this->request->getPost('correo')))
        $data["correo"] = $this->request->getPost('correo');

        if(!empty($this->request->getPost('contrasena')))
        $data["contrasena"] = $this->request->getPost('contrasena');

        if(!empty($this->request->getPost('tipo_usuario')))
        $data["tipo_usuario"] = $this->request->getPost('tipo_usuario');

        $result = $this->model->update($id,$data);
 
        if($result){
            $usuario = $this->respond($this->model->find($id));
            return $this->respond(
                ["result" => "El usuario se edito correctamente!",
                "data"=>$usuario]);
        }else{
             return $this->respond(["error" => "El usuario no se edito correctamente!"]);
        }
    }

    public function delete($id=null){
        $result = $this->model->delete($id);

        if($result){
            return $this->respond(["result" => "El usuario se elimino correctamente!"]);
        }else{
             return $this->respond(["error" => "El usuario no se elimino correctamente!"]);
        }
    }

}